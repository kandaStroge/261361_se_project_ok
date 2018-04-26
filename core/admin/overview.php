<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$page['title'] = "Admin overview";
$templete_prefix = "../";
require_once (__DIR__."/../template/header.php");
$logout_prefix = "../";
require_once (__DIR__."/../template/navbar.php");

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/admin/overview.html");

$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'STUDENT_NAME'=> $_SESSION['username'],
    'PAGE_TITLE' => $page['title'],
    'STUDENT_ID'=> $_SESSION['sid']
];





//echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);


?>