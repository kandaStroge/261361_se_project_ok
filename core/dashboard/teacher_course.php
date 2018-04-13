<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$page['title'] = "Teacher Dashboard";
require_once (__DIR__."/../template/header.php");
require_once (__DIR__."/../template/navbar.php");

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/dashboard/student_course.html");

$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'STUDENT_NAME'=> $_SESSION['username'],
    'PAGE_TITLE' => $page['title'],
    'STUDENT_ID'=> "Teacher"
];

$sid = $_SESSION['sid'];

$sql = "SELECT course_id FROM tbl_members_course WHERE sid=?";
$course_conten = "";

if($stmt = $connect->prepare($sql)) {

    $stmt->bind_param('s', $sid);
    $stmt->execute();
    $stmt->bind_result($res);
    $stmt->store_result();
    $course_list = [];
    while ($stmt->fetch()) {
        array_push($course_list, $res);
    }

    //TODO fix to use stmt

    $k = implode(', ', $course_list);
    $joint_content = "<div>JOIN COURSE</div>";
    echo $joint_content;
    if (strlen($k) <= 0) {


    } else {


        $sql = "SELECT cid, course_name, course_code, private FROM tbl_courses WHERE cid IN ({$k})";

        $res = $connect->query($sql);
        $course_list = [];
        $card_content = '<div class="card-group">';
        while ($row = $res->fetch_assoc()) {
            $card_content .= '
           
            <div class="col-4"><a href="./dashboard.php?id=' . $row["cid"] . '">
                <div class="card"> <img class="card-img-top" src="' . TEMPLATE_FOLDER . '/img/cpe_logo_bg.png" alt="Card image cap">
                    <div class="card-body" style="min-height: 180px;">
                        <h4 class="card-title">' . $row["course_name"] . '</h4>
                            <p class="card-text">Detail</p>
                    </div>                
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                </a>
            </div>
            ';
        }
        $card_content .= '</div>';


        $course_conten = $card_content;


    }
    $replacers = [
        'TEMPLATE_DIR' => TEMPLATE_FOLDER,
        'STUDENT_NAME' => $_SESSION['username'],
        'PAGE_TITLE' => $page['title'],
        'STUDENT_ID' => $_SESSION['sid'],
        'CONTENT' => $course_conten
    ];


    echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);
    }


?>