<?php
if(!isset($_GET['id'])){
    exit(0);
}

include_once 'inc/database_connect.inc.php';
$sql = "DELETE FROM tbl_activity WHERE id=".$_GET['id'];

if ($connect->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $connect->error;
}
               
$connect->close();

header("Location: dashboard.php");
die();
?>