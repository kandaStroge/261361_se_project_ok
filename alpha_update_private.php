<?php
require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");

if(isset($_GET['id']) ){
    $cid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT private FROM tbl_courses WHERE cid = ? LIMIT 1";
    $stmt = $connect->prepare($sql);
    if($stmt){
        $stmt->bind_param('i', $cid);
        $stmt->execute();
        $res = $stmt->get_result();
        //

        if($res->num_rows == 1){
            $private_status = $res->fetch_array()['private'];
            if($private_status == 1){
                $private_status = 0;
                echo "gg";
            }else{
                $private_status = 1;
            }

            $sql = "UPDATE tbl_courses SET private = ? WHERE cid = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param('ii', $private_status, $cid);
            $stmt->execute();
            header('Location: dashboard.php?id='.$cid);
        }else{
            header('Location: ./core/error.php?code=902');
        }
    }else{
        header('Location: ./core/error.php?code=902');
    }
}else{
    header('Location: ./core/error.php?code=permission_denied');
}

?>
