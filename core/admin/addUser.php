<?php
require_once (__DIR__."./../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$replacers = [
    'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
    'LOGIN_CHECK_PROCESS'=> "./register.php",
    'LOGIN_ERROR_MSG' => "ssss"
];

$page = file_get_contents(TEMPLATE_FOLDER."reg_form_temp.html");
if(!isset($_POST['u'], $_POST['p'])){
    // not login process
    unset($_SESSION['error_message']);
    echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page);
}else{


    $u = filter_input(INPUT_POST, 'u', FILTER_SANITIZE_STRING);
    $p = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    $p = password_hash($p, PASSWORD_BCRYPT);
    $sid = filter_input(INPUT_POST, 'sid', FILTER_SANITIZE_STRING);

    //echo $u;
    //echo $sid;
    //echo $p;

    $sql = "SELECT uid FROM tbl_members WHERE username = ? LIMIT 1";
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
        $error_msg .= "<div class='alert alert-danger'>DBERROR</div>";
        $stmt->close();

    }

    //Register
    if ($error_msg == "") {
        $sql = "INSERT INTO tbl_members (username, password, email, sid, role) VALUES (?, ?, ?, ?, '0')";
        echo "isindent";
        if ($insert_stmt = $connect->prepare($sql)){
            $insert_stmt->bind_param('ssss', $u, $p, $sid, $sid);
            $x = $insert_stmt->execute();
            //echo $insert_stmt->error;
            echo "yes";
            if (! $x) {
                echo "Insert fail";
                $_SESSION['error_message'] = $error_msg;
                header('Location: ./register.php');
            }else{
                echo "gg";
                unset($_SESSION['error_message']);
                header('Location: ./core/error.php?code=902');
            }
        }
    }
}

?>
