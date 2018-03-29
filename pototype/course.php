<?php
    session_start();
    if(!isset($_SESSION['token'])){
        echo 'access denied!';
        exit(0);
    }
    if($_SESSION['token'] == "TEACHER"){
        include_once 'inc/teacher_course.php';
    }elseif($_SESSION['token'] == "STUDENT"){
        include_once 'inc/student_course.php';
    }else{
        echo "error token";
    }
?>
