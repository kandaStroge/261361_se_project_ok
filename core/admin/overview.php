<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");
$ADMIN_USERMANGE_MENU_LIST = [
    "adduser" => ["Add user", "addUser.php"],
    "addgroup" => ["Add Group", "addGroup.php"],
    "deleteuser" =>["Delete User", "deleteUser.php"],

];
if(!isset($_GET['a'])){
    $page['title'] = "Admin overview";
    $templete_prefix = "../";
    require_once (__DIR__."/../template/header.php");
    $logout_prefix = "../";
    require_once (__DIR__."/../template/navbar.php");

    $page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/admin/overview.html");

    $ADMIN_USERMANGE_MENU_LIST_CONTENT = "";
    foreach ($ADMIN_USERMANGE_MENU_LIST as $key => $menu){
        $ADMIN_USERMANGE_MENU_LIST_CONTENT .= '<li><a href="setting.php?a='.$key.'">'.$menu[0].'</a></li>';
    }
    $msg = "";

    if(isset($_SESSION['error_message'])){
        $msg .= "<div class='alert alert-danger'>";
        $msg .= $_SESSION['error_message'];
        $msg .= "</div>";
    }


    $replacers = [
        'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
        'STUDENT_NAME'=> $_SESSION['username'],
        'PAGE_TITLE' => $page['title'],
        'ADMIN_USERMANGE_MENU_LIST'=> $ADMIN_USERMANGE_MENU_LIST_CONTENT,
        'CONTENT' => "gg",
        "MSG" => $msg
    ];
    echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);
}else{
    $action = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);

    if(array_key_exists($action, $ADMIN_USERMANGE_MENU_LIST)){
        require_once (__DIR__."./".$ADMIN_USERMANGE_MENU_LIST[$action][1]);
    }else{
        header('Location: ./setting.php');

    }


}




?>