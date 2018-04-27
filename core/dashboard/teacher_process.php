<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$page['title'] = "Teacher Dashboard";
require_once (__DIR__."/../template/header.php");
require_once (__DIR__."/../template/navbar.php");

$header = "Course Process";

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/dashboard/alpha_display_username.html");

$cid = $_GET['id'];
$sql = "SELECT * FROM tbl_courses WHERE cid = $cid";
$result = $connect->query($sql);

$content = "";
$content .= '<br><a href="show.php?id='.$cid.'"><button type="button" class="btn btn-primary">Go To Process All Group Page</button></a> <a href="alpha_update_private.php?id='.$cid.'"><button type="button" class="btn btn-secondary">Change public or private</button></a>';

$sql = "SELECT * FROM tbl_activity WHERE course_id = ? ";
$stmt = $connect->prepare($sql);

$activity_table_head = "";
if($stmt){
    $stmt->bind_param('i', $cid);
    $stmt->execute();
    $res = $stmt->get_result();

    while($row = $res->fetch_assoc()){
        $activity_table_head .= '<tr>';
        $activity_table_head .= '<td>'.$row['name'].'</td>';
        $activity_table_head .= '</tr>';
    }


}

$replacers = [
    'TEMPLATE_DIR' => TEMPLATE_FOLDER,
    'PAGE_TITLE' => $page['title'],
    'HEADER' => $header,
    'CONTENT' => $content,
    'ACTIVITY_TABLE'=> $activity_table_head,
    'AUTO_CID', $cid
];

echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);

?>