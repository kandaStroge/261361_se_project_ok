<?php

require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");

$cid = $_GET['id'];

echo "Totic Finish for every group DATASOURE<br>";

$sql = "SELECT * FROM tbl_activity_checked WHERE course_id = $cid ";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()) {
    echo $row["aid"]."<br/>";
}
?>