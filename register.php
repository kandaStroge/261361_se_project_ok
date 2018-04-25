<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");



sec_session_start();


$page = file_get_contents(TEMPLATE_FOLDER."reg_form_temp.html");


$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'LOGIN_CHECK_PROCESS'=> "./register.php",
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
    $error_msg = "";

    $u = filter_input(INPUT_POST, 'u', FILTER_SANITIZE_STRING);
    $p = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    $p = password_hash($p, PASSWORD_BCRYPT);
    $sid = filter_input(INPUT_POST, 'sid', FILTER_SANITIZE_STRING);

    //echo $u;
    //echo $sid;
    //echo $p;

    $sql = "SELECT uid FORM tbl_members WHERE username = ? LIMIT 1";
    $stmt = $connect->prepare($sql);
    // TODO Make JS sha512 login password encyption

    //Checking exist username
    if($stmt){
        $stmt->bind_param('s', $u);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 1 ){
            $error_msg .= "<div class='alert alert-danger'>Please use another USERNAME</div>";
            $stmt->close();
        }
    }else{
        //echo  "Exist username";
        $error_msg .= "DB error line 39";
        //$stmt->close();

    }

    //Register
    if (!empty($error_msg)) {
        $sql = "INSERT INTO tbl_members (username, password, email, sid, role) VALUES ('$u','$p','$sid','$sid', '0')";
        if ($insert_stmt = $connect->prepare("INSERT INTO tbl_members (username, password, email, sid, role) VALUES ('$u','$p','$sid','$sid', '0')")){
            $insert_stmt->bind_param('ssss', $u, $p, $sid, $sid);
            $x = $insert_stmt->execute();
            //echo $insert_stmt->error;
            echo "yes";
            if (! $x) {
                echo "Insert fail";
                header('Location: ./core/error.php?code=902');
            }else{
                header('Location: ./logout.php');
            }
        }
    }
    //


}

?>


