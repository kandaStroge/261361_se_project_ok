<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/navbar.html");

$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'LOGIN_CHECK_PROCESS'=> "./login.php",
    'PAGE_TITLE' => $page['title']
];




echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);


?>