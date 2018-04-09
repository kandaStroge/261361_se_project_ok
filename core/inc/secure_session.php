<?php
require_once  (__DIR__."/../config.php");
function sec_session_start(){
    $temp_sec_name = md5("abcdefghijklmnopqrstuvwxyz");
    $sec = SECURE;
    $httponly = true;
    if (ini_set('session.use_only_cookies', 1) === true) {
        header("Location: ./ErrorMessagePage.php?code=404");
        exit();
    }

    $cookieParams = session_get_cookie_params();
    //session_get_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $sec, $httponly);

    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $sec, $httponly);

    session_name($temp_sec_name);
    session_start();
    session_regenerate_id();
}

?>