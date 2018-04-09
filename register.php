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
    echo $u;
    $p = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    $sid = filter_input(INPUT_POST, 'sid', FILTER_SANITIZE_STRING);
    echo  $p."\n";
    echo $sid;
    //$p = hash('sha512', $p);
    $p = password_hash($p, PASSWORD_BCRYPT);
    echo $p;

    $sql = "SELECT uid FORM tbl_members WHERE username = ? LIMIT 1";
    $stmt = $connect->prepare($sql);
    // TODO Make JS sha512 login password encyption

    //check exist username

    if($stmt){
        $stmt->bind_param('s', $u);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 1 ){
            $error_msg .= "<div class='alert alert-danger'>Plase use another USERNAME</div>";
            $stmt->close();
        }
    }else{
        //TODO  is ERROR plz fix
        $error_msg .= "DB error line 39";
        //$stmt->close();

    }

    //reg

    if (!empty($error_msg)) {
        $sql = "INSERT INTO tbl_members (username, password, email, sid) VALUES (?,?,?,?)";
        if ($insert_stmt = $connect->prepare("INSERT INTO tbl_members (username, password, email, sid) VALUES (?, ?, ?, ?)")){
            $insert_stmt->bind_param('ssss', $u, $p, $sid, $sid);
            $x = $insert_stmt->execute();
            //echo $insert_stmt->error;
            echo "yes";
            if (! $x) {
               echo "Inser fail";
               header('Location: ./core/error.php?code=902');
            }else{
                header('Location: ./logout.php');
            }
        }

    }
    //


}




?>


