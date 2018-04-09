<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");


sec_session_start();
// TODO plz new imprement by SECURE protocol
if( $_SESSION['role'] == 0){
    require_once (__DIR__."/core/dashboard/student_course.php");
}
print_r($_SESSION);

?>