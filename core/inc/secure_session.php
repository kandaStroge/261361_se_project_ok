<?php
require realpath("../inc/config.php");
function sec_session_start(){
    $temp_sec_name = md5(rand(0,1000));
    $sec = SECURE;
    $httponly = true;
    if (ini_set('session.use_only_cookies', 1) === true){
        echo "ddd";
        header("Location: ../kk.php");
    }else{
        echo "sssss";
        header("Location: ../kk.php");
    }
}
sec_session_start();
?>