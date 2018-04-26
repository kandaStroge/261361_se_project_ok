<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");

if(isset($_GET['id']) ){

    $uid = $_GET['id'];
    $sql = "DELETE FROM tbl_members WHERE uid = $uid";
    $res = $connect->query($sql);

    if($res = $connect->query($sql)){
        echo "Delete Done";
        header("Location: alpha_display_username.php");
    }else{
        echo "Delete Error";
    }

    die();

}else{
    exit(0);
}

?>
