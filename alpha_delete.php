<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");

$uid = $_GET['uid'];
$sql = "DELETE FROM tbl_members WHERE uid = $id";

if ($result = $connect->prepare($sql) ){
    header('Location: alpha_display_username.php');
} else {
    echo "Error deleting record";
}

?>
