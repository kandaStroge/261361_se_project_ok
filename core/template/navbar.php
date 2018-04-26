<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/navbar.html");

$menu_list = [
    ["dashboard.php", "Dashboard", 0],
    ["alpha_display_username.php", "Delete member", 1],
    ["alpha_public_private.php", "Set private", 1],
    ["setting.php", "Configulation", "1"]
];
$content = '<ul class="list-group">';

foreach ($menu_list as $list){
    if(sizeof($list) == 3){
        if($_SESSION["role"] >= $list[2]){
            $content .= '<li class="list-group-item"><a href="'.$list[0].'">'.$list[1].'</a></li>';
        }

    }
}
$content .= '</ul>';

$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'LOGIN_CHECK_PROCESS'=> "./login.php",
    'PAGE_TITLE' => $page['title'],
    'UI_CONTENT' => $content,
    'USERNAME' => $_SESSION['username']
];





echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);


?>