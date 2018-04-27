<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$page['title'] = "Student Dashboard";
require_once (__DIR__."/../template/header.php");
require_once (__DIR__."/../template/navbar.php");

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/dashboard/student_course.html");

$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'STUDENT_NAME'=> $_SESSION['username'],
    'PAGE_TITLE' => $page['title'],
    'STUDENT_ID'=> $_SESSION['sid']
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
    while ($stmt->fetch()){
        array_push($course_list, $res);
    }

    //TODO fix to use stmt

    $k = implode(', ', $course_list);


    $sql = "SELECT cid, course_name, course_code, private, details FROM tbl_courses WHERE cid IN ({$k})";

    $res = $connect->query($sql);
    $course_list = [];
    $card_content = '<div class="card-group">';
    while ($row = $res->fetch_assoc()){
        $card_content .='
            <div class="col-md-11">
                <div class="jumbotron">
                    <h5>'
                        .$row["course_name"]
                    .'</h5>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-1">
                            <a href ="./dashboard.php?id='.$row["cid"].'">
                                <button type="button" class="btn btn-primary" >
                                    View assignment
                                </button>
                            </a>
                        </div>
                        <div class="col-md-7">
                        </div>
                     </div>
                </div>
            </div>
        ';
    }

    $course_conten = $card_content;

}
$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'STUDENT_NAME'=> $_SESSION['username'],
    'PAGE_TITLE' => $page['title'],
    'STUDENT_ID'=> $_SESSION['sid'],
    'CONTENT' => $course_conten
];





echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);


?>