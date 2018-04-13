<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");

if(isset($_GET['id']) && isset( $_GET['gid']) && $_GET['cid'] ){

    $gid = $_GET['gid'];
    $cid = $_GET['cid'];
    $aid = $_GET['id'];
    $sql = "SELECT * FROM tbl_activity_checked WHERE gid = $gid AND aid = $aid";
    $res = $connect->query($sql);
    if($res->num_rows <= 0){
        $sql = "INSERT INTO tbl_activity_checked (aid, gid, course_id) VALUES ($aid, $gid, $cid)";
        $res = $connect->query($sql);
    }else{

        $sql = "DELETE FROM tbl_activity_checked WHERE gid = $gid AND aid = $aid";

        if ($connect->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $connect->error;
        }
    }


   /*$sql = "UPDATE tbl_activity SET checked=!$p WHERE id=".$_GET['id'];
    $result = $connect->query($sql);*/


    //$connect->close();

    header("Location: dashboard.php?id=".$cid);
    die();
}else{
    exit(0);
}


?>