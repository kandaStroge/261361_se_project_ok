<?php
require_once "config.php";
function sec_session_start(){
    $temp_sec_name = md5(rand(0,1000));
    $sec = SECURE;
    $httponly = true;
    if (ini_set('session.use_only_cookies', 1) == false){
        header("Location: ./ErrorMessagePage.php?code=404");
        exit();
    }

    $cookieParams = session_get_cookie_params();
    session_get_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $sec, $httponly);
    session_name($temp_sec_name);
    session_start();
    session_regenerate_id();
}

?>