<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");



sec_session_start();

$code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
$cid = filter_input(INPUT_GET, 'cid', FILTER_SANITIZE_NUMBER_INT);
$details = "";
$sql = "INSERT INTO tbl_courses ( course_name, course_code, private, details) VALUES (?,? ,0 ,?)";
$stmt = $connect->prepare($sql);
$stmt->bind_param('sis',$name, $code, $details);
$stmt->execute();
$stmt->error;
header("Location: dashboard.php");
die();
?>