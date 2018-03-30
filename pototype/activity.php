<?php
if(!isset($_GET['id'])){
    exit(0);
}

include_once 'inc/database_connect.inc.php';
$sql = "SELECT checked FROM tbl_activity WHERE id=".$_GET['id'];
$result = $connect->query($sql);

$p = 0;

while($row = $result->fetch_assoc()) {
    $p = $row['checked'];
 } 

$sql = "UPDATE tbl_activity SET checked=!$p WHERE id=".$_GET['id'];
$result = $connect->query($sql);
               
$connect->close();

header("Location: process.php");
die();
?>