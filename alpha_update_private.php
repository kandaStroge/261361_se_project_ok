<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");

if(isset($_GET['id']) ){

    $cid = $_GET['id'];

    $sql = "SELECT private FROM tbl_courses WHERE cid = $cid";
    $current = $connect->query($sql);

    if($current == 1){
        $current = 0;
    }
    elseif($current == 0){
        $current = 1;
    }

    $sql = "UPDATE tbl_courses SET private='$current' WHERE cid='$cid'";
    $res = $connect->query($sql);
    if($res = $connect->query($sql)){
        echo "Update Done";
        header("Location: dashboard.php");
    }else{
        echo "Update Error";
    }

    die();

}else{
    exit(0);
}

?>
