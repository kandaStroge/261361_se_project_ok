<?php
require_once (__DIR__."../core/config.php");
require_once (__DIR__."../core/inc/secure_session.php");
require_once (__DIR__."../core/functions.php");
require_once (__DIR__."../core/inc/database_api.php");


sec_session_start();
//print_r($_SESSION);
// TODO plz new imprement by SECURE protocol
if(!$_SESSION['isadmin']) {
    $_SESSION['error_message'] = "<div class='alert alert-danger'>Username or password is wrong</div>";
    header('Location: ./login.php');
}


?>