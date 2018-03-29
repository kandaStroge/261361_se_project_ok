<?php
session_start();

if(!isset($_POST["user"]) || !isset($_POST["pass"])){
    exit(0);
}
$skip = false;
$user = $_POST["user"];
if($user > 100){
    $_SESSION['token'] = "STUDENT";
    $_SESSION['user'] = $user;
}else if($user == "t"){
    $_SESSION['token'] = "TEACHER";
    $_SESSION['user'] = "SAMPLE_TEACHER";
}


header("Location: dashboard.php");
die();
?>
