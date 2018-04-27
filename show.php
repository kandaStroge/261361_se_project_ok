<?php

require_once (__DIR__."/core/config.php");
require_once (__DIR__."/core/inc/secure_session.php");
require_once (__DIR__."/core/functions.php");
require_once (__DIR__."/core/inc/database_api.php");

sec_session_start();
$page['title'] = "Show Table";
require_once (__DIR__."./core/template/header.php");
require_once (__DIR__."./core/template/navbar.php");

if(!isset($_GET['id'])){
    echo "error not found course";
}

$bool_isShowTable = false;
$cid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if( $_SESSION['role'] < 1) {
    $sql = "SELECT private FROM tbl_courses WHERE cid = ? LIMIT 1";
    $stmt = $connect->prepare($sql);

    if($stmt){
        $stmt->bind_param('i', $cid);
        $stmt->execute();
        $res = $stmt->get_result();

        if($res->num_rows == 1) {
            $private_status = $res->fetch_array()['private'];
            $bool_isShowTable = ($private_status < 1);
        }
    }
}else{
    $bool_isShowTable = true;
}

$in_course_active = [];
function activityTable($table_array){
    $content = "";
    global $connect, $cid;
    $temp_group_list = [];
    $sql = "SELECT * FROM tbl_courses_groups WHERE tbl_courses_id = ? ";
    $stmta = $connect->prepare($sql);

    $activity_name_list = getAllActivity($cid);
    if($stmta){
        $stmta->bind_param('i', $cid);
        $stmta->execute();
        $res = $stmta->get_result();
        while($row = $res->fetch_assoc()){
            $temp_group_list[$row['id']] = $row['group_name'];
        }



        $table = [];

        foreach ($table_array as $key => $value){
            //echo $temp_group_list[$key];
            if (!isset($table[$key])){
                //echo "_";
                $table[$key] = [];
            }
            foreach ($activity_name_list as $tk => $tv){
                if(in_array($tk, $value)){
                    array_push($table[$key], true);
                }else{
                    array_push($table[$key], false);
                }
            }
            /*foreach ($value as $v){
                echo $activity_name_list[$v];
            }*/
        }
        $content .= '<div class="row">';
        $content .= '<table class="table table-striped">';
        $content .= '<thead><tr><th class="rotate"><div><span>#</span></div></th>';

        foreach ($activity_name_list as $vv){
            $content .= "<th class=\"rotate\"><div><span>".$vv."</span></div></th>";
        }

        $content .= '</tr></thead>';
        foreach ($table as $kk => $vv){

            $content .= '<tr>';
            $content .= '<td>'.$temp_group_list[$kk].'</td>';

            foreach ($vv as $k => $v){
                $content .= '<td>';
                if($v){
                    $content .= "yes";
                    $content .= '';
                }else{
                    $content .= "no";
                }

            }
            $content .= '</tr>';


        }$content .= '<table>';
        $content .= '</div>';
        return $content;
    }
}

function getAllActivity($cid){
    $temp_activity_name = [];
    global $connect;
    $sql = "SELECT * FROM tbl_activity WHERE course_id = ? ";
    $stmt = $connect->prepare($sql);
    if($stmt){
        $stmt->bind_param('i', $cid);
        $stmt->execute();
        $res = $stmt->get_result();
        while($row = $res->fetch_assoc()){
            $temp_activity_name[$row['id']] = $row['name'];
        }
        return $temp_activity_name;
    }

}

$content_read = "";
if($bool_isShowTable){
    $sql = "SELECT * FROM tbl_courses WHERE cid = ? ";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param('i', $cid);
    $stmt->execute();
    $res = $stmt->get_result();

    $name = $res->fetch_array();
    $content_read .= '<h1>'.$name['course_code']."</h1><h2>".$name['course_name'].'</h2>';

    $sql = "SELECT * FROM tbl_courses_groups WHERE tbl_courses_id = ? ";
    $stmt = $connect->prepare($sql);
    if($stmt){
        $stmt->bind_param('i', $cid);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_assoc()){
            $in_course_active[$row['id']] = [];
            $sql = "SELECT * FROM tbl_activity_checked WHERE course_id = ? AND gid = ?";
            $stmt2 = $connect->prepare($sql);
            $stmt2->bind_param('ii', $cid, $row["id"]);
            $stmt2->execute();
            $res2 = $stmt2->get_result();
            while ($row2 = $res2->fetch_assoc()){
                array_push($in_course_active[$row['id']], $row2["aid"]);
            }
        }
    }else{
        echo "DB Error";

    }

    $content_read .= activityTable($in_course_active);


    $page = file_get_contents(TEMPLATE_FOLDER."show.html");
    $error_message = "";

    if(isset($_SESSION['error_message'])){
        $error_message = $_SESSION['error_message'];
    }

    $replacers = [
        'TEMPLATE_DIR'=> TEMPLATE_FOLDER,
        'LOGIN_CHECK_PROCESS'=> "./login.php",
        'CONTENT' => $content_read
    ];
    echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page);

}else{
    header('Location: ./dashboard.php');
}



?>