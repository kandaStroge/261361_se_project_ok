<?php
$conn = new mysqli("167.99.73.145", "ball", "123456789", "test_createDB");
if($conn->connect_error){
    die ("Erro : ". $conn->connect_error);
}

$sql = "SELECT * FROM alp_testCreateTable";
$res = $conn->query($sql);
print_r($res);
?>