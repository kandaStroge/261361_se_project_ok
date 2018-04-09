<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");



sec_session_start();


$page = file_get_contents(TEMPLATE_FOLDER."login_form.html");
$error_message = "";

if(isset($_SESSION['error_message'])){
    $error_message = $_SESSION['error_message'];
}

$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'LOGIN_CHECK_PROCESS'=> "./login.php",
    'ERROR_MESSAGE' => $error_message
];


function replace_callback($matches){
    global $replacers;

    // TODO Make filter input {}

    if (array_key_exists($matches[1], $replacers)){
        return $replacers[$matches[1]];
    }else{
        return '';
    }

}

if(!isset($_POST['u'], $_POST['p'])){
    // not login process
    echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page);
}else{
    $u = filter_input(INPUT_POST, 'u', FILTER_SANITIZE_STRING);
    $p = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if(login($u, $p, $connect)){
        unset($_SESSION['error_message']);
        header('Location: ./index.php');
    }else{
        $_SESSION['error_message'] = "<div class='alert alert-danger'>Username or password is wrong</div>";
        header('Location: ./login.php');
    }


    // TODO Make JS sha512 login password encyption

}




?>


