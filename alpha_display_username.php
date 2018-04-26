<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");


sec_session_start();
//print_r($_SESSION);
// TODO plz new imprement by SECURE protocol
if( $_SESSION['role'] == 0) {
    if (!isset($_GET['id'])) {
        require_once(__DIR__ . "/core/dashboard/alpha_display_username.php");

    } else {
        // TODO MAKE IT SECURE
        $_SESSION['cid'] = $_GET['id'];
        require_once(__DIR__ . "/core/dashboard/alpha_display_username.php");
    }
}elseif ($_SESSION['role'] == 1){
    if (!isset($_GET['id'])) {
        require_once(__DIR__ . "/core/dashboard/alpha_display_username.php");

    } else {
        require_once(__DIR__ . "/core/dashboard/alpha_display_username.php");
    }
}else{
    echo "access denied";
}
?>
