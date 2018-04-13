<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$page['title'] = "Student Dashboard";
require_once (__DIR__."/../template/header.php");
require_once (__DIR__."/../template/navbar.php");

//TODO MAKE IT Secure
$cid = $_SESSION['cid'];

$sql = "SELECT course_name FROM tbl_courses WHERE cid = $cid LIMIT 1";
$result = $connect->query($sql);


if($result->num_rows){
    $course_name = $result->fetch_array()[0];
}else{
    echo "something error";
}


$sql = "SELECT private FROM tbl_courses WHERE cid = $cid LIMIT 1";
$result = $connect->query($sql);


if($result->num_rows){
    $isShow = $result->fetch_array()[0];
}else{
    echo "something error";
}

$gid = 1;
$sid = $_SESSION['sid'];

$sql = "SELECT * FROM tbl_members_groups WHERE sid = $sid AND cid = $cid LIMIT 1";
$result = $connect->query($sql);
if($result->num_rows){
    $gid = $result->fetch_array()[0];
}else{
    echo "<div class='container alert alert-danger'>Group error</div>";
}



$sql = "SELECT * FROM tbl_activity WHERE course_id = $cid";
$result = $connect->query($sql);
$work_fin = 0;
$work_all = $result->num_rows;
$data = array(
    "name"=>array(),
    "detail"=>array(),
    "id" => array(),
    "checked" => array()
);
while($row = $result->fetch_assoc()) {
    array_push($data["name"], $row["name"]);
    array_push($data["detail"], $row["details"]);
    array_push($data["id"], $row["id"]);
}

$sql = "SELECT * FROM tbl_activity_checked WHERE gid = $gid AND course_id = $cid ";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()) {
    array_push($data["checked"], $row["aid"]);
}

$work_fin = sizeof($data['checked']);


if($work_all == 0){
    $percentage = 0;
}else{
    $percentage = $work_fin/$work_all * 100;
}

$activity_list_content = "";

for($i = 0; $i < count($data["name"]); $i++){
    $activity_list_content .= '<tr>';
    $activity_list_content .= '<td><a href="./activity.php?id='.$data["id"][$i].'">';

    $activity_list_content .= '<label class="switch">';
    if(in_array($data['id'][$i], $data['checked'])){
        $activity_list_content .= '<input type="checkbox" checked onclick="window.location.href=\'./activity.php?id='.$data["id"][$i].'&gid='.$gid.'&cid='.$cid.'\'"><span class="slider" ></span>';

    }else {
        $activity_list_content .= '<input type="checkbox" onclick="window.location.href=\'./activity.php?id='.$data["id"][$i].'&gid='.$gid.'&cid='.$cid.'\'"><span class="slider" ></span>';

    }
    $activity_list_content .= '</label></a></td>';


    $activity_list_content .= '<td ><a href="#" onclick=\'$("#d'.$data["id"][$i].'").toggle();\'>'.$data["name"][$i].'</a>';
    $activity_list_content .= '<p class="" id="d'.$data["id"][$i].'" style="display: none;">'.$data["detail"][$i].'</p>';
    $activity_list_content .= '</td>';



    $activity_list_content .= '</tr>';

}

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/dashboard/student_process.html");


$FONT_COLOR = $percentage >= 100 ? "white" : "yellow";
$PERCENTAGE_TEXT_CLASS =  $percentage >= 100 ? "text-success" : "";
$PERCENTAGE_BADGE_INFO = $percentage >= 100 ? "badge-success" : "badge-secondary";
$PERCENTAGE_BAR_CLASS = $percentage >= 100 ? "bg-success" : "";
$isShow = ($isShow == 0)?"<a href='./show.php?id=".$cid."'>Show Progress</a>":"";
$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'STUDENT_NAME'=> $_SESSION['username'],
    'PAGE_TITLE' => $page['title'],
    'STUDENT_ID'=> $_SESSION['sid'],
    'USERNAME'=> $_SESSION['username'],
    'PERCENTAGE_TEXT_CLASS'=> $PERCENTAGE_TEXT_CLASS,
    'PERCENTAGE_BAR_CLASS'=>$PERCENTAGE_BAR_CLASS,
    'PERCENTAGE_BADGE_INFO'=>$PERCENTAGE_BADGE_INFO,
    'FONT_COLOR'=>$FONT_COLOR,
    'WORK_FIN'=> $work_fin,
    'WORK_ALL' => $work_all,
    'SUBJECT_TITLE' => $course_name,
    'PERCENTAGE' => $percentage,
    'CONTENT' => $activity_list_content,
    'SHOW_CONTENT'=> $isShow
];

echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);

?>