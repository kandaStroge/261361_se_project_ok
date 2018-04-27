<?php
require_once (__DIR__."./../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");
$page['title'] = "addGroup";

require_once (__DIR__."./../template/header.php");
require_once (__DIR__."./../template/navbar.php");
$msg = "";

if(isset($_SESSION['error_message'])){
    $msg .= "<div class='alert alert-danger'>";
    $msg .= $_SESSION['error_message'];
    $msg .= "</div>";
}
$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'LOGIN_CHECK_PROCESS'=> "./register.php",
    'LOGIN_ERROR_MSG' => "",
    'MSG' => $msg
];

$page = file_get_contents(TEMPLATE_FOLDER."./admin/group.html");



if(!isset($_GET['cid'])){
    // not login process
    unset($_SESSION['error_message']);
    echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page);
}else{
    echo "dddaaaa";
    $group_name = filter_input(INPUT_GET, 'gn', FILTER_SANITIZE_STRING);
    $cid = filter_input(INPUT_GET, 'cid', FILTER_SANITIZE_NUMBER_INT);

    //Register
    if ($error_msg == "") {
        $sql = "INSERT INTO tbl_courses_groups (group_name, tbl_courses_id) VALUES (?, ?)";
        echo "isindent";
        if ($insert_stmt = $connect->prepare($sql)){
            $insert_stmt->bind_param('ss', $group_name, $cid);
            $x = $insert_stmt->execute();
            echo $insert_stmt->error;
            echo "yes";
            if (! $x) {
                echo "Insert fail";
                $_SESSION['error_message'] = "Insert fail";
                header('Location: ./setting.php?a=addgroup');
            }else{

                $_SESSION['error_message'] = "Succesful insert";
                header('Location: ./setting.php?a=addgroup');
            }
        }
    }
}

?>
