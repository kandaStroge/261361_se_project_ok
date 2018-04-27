<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");



sec_session_start();

$time = "2018-04-1";
$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
$cid = filter_input(INPUT_GET, 'cid', FILTER_SANITIZE_NUMBER_INT);
$details = "";
$sql = "INSERT INTO tbl_activity ( name, time,  checked, course_id, details) VALUES (?,?,0 ,?,?)";
$stmt = $connect->prepare($sql);
$stmt->bind_param('ssis',$name, $time,  $cid, $details);
$stmt->execute();
$stmt->error;
header("Location: dashboard.php?id=".$cid);
die();
?>