<?php
include_once  realpath("inc/ErrorMessagePage.php");
//include (realpath("../../core/inc/secure_session.php"));

$err = new ErrorMessagePage();

if(isset($_GET["code"])){
    $p = $err->getErrorMessageByCode($_GET["code"]);
}else{
    header("Location: ../index.php");
    exit();
}


$page = file_get_contents(realpath("../templetes/default/error/error.html"));

$replacers = [
    'error_title'=> $p['header'],
    'error_header'=> $p['header'],
    'error_messgae' => $p['mess'],
    'TEMPLATE_DIR' => "../templetes/default/",
    'HOME_DIR' => "http://".$_SERVER['HTTP_HOST'].dirname(dirname($_SERVER['PHP_SELF'])."/")
];


function replace_callback($matches){
    global $replacers;
    if (array_key_exists($matches[1], $replacers)){
        return $replacers[$matches[1]];
    }else{
        return '';
    }

}

echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page);

?>