<?php
$page['title'] = "alpha_display_group";
require_once (__DIR__."/../template/header.php");
require_once (__DIR__."/../template/navbar.php");

$header = "alpha_display_group";

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/dashboard/alpha_display_username.html");

$cid = $_GET['id'];
$sql = "SELECT * FROM tbl_activity_checked WHERE course_id = $cid ";
$result = $connect->query($sql);

//--Content part--//
$content = "";
$content .= '
    <div class="container">
        <table class="table">
        <thead>
        <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
';



//Display username data
if ($result = $connect->prepare($sql)) {

    $res = $connect->query($sql);
    while($row = $res->fetch_assoc()) {
        $content .= '<tr>';
        //$content .= '<td>' .$row["username"] .' </td>';
        //$content .= '<td><a href="alpha_delete.php?id='.$row["uid"].'" class="badge badge-danger">Delete</a></td>';
        $content .= '</tr>';
    }

} else {
    echo "0 results";
}

$content .= '
        </tbody>
        </table>
        </div>
    ';


//----------------//


$replacers = [
    'TEMPLATE_DIR' => TEMPLATE_FOLDER,
    'PAGE_TITLE' => $page['title'],
    'HEADER' => $header,
    'CONTENT' => $content
];

echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);

?>