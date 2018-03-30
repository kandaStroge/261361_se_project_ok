<?php
if(!isset($_GET['act_name'])){
    exit(0);
}

$name = $_GET['act_name'];

include_once 'inc/database_connect.inc.php';
$sql = "INSERT INTO tbl_activity ( name, checked)
VALUES ('".$name."',0 )";
if ($connect->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}      
$connect->close();

header("Location: dashboard.php");
die();
?>