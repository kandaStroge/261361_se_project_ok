<?php

require_once (__DIR__.'/core/inc/secure_session.php');
require_once (__DIR__.'/core/inc/database_api.php');
require_once (__DIR__.'/core/functions.php');
sec_session_start();
print_r( $_SESSION);
if(!isset($_SESSION['login_string'])){
    header('Location: ./login.php');
}else{
    header('Location: ./dashboard.php');
}



?>