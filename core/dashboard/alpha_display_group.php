<?php
$page['title'] = "alpha_display_group";
require_once (__DIR__."/../template/header.php");
require_once (__DIR__."/../template/navbar.php");

$header = "alpha_display_group";

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/dashboard/public_private.html");

$cid = $_GET['id'];
$sql = "SELECT * FROM tbl_activity_checked JOIN tbl_activity a on tbl_activity_checked.aid = a.id JOIN tbl_courses_groups g on tbl_activity_checked.gid = g.id 
        WHERE tbl_activity_checked.course_id = $cid" ;
$result = $connect->query($sql);

//--Content part--//
$content = "";
//Display username data
if ($result = $connect->prepare($sql)) {
    $res = $connect->query($sql);
    $content .= '
        <div class= "table-responsive">
        <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
        <th scope="col">Group name</th>
        <th scope="col">Sub Assignment1</th>
        <th scope="col">Sub Assignment2</th>
        <th scope="col">Sub Assignment3</th>
        <th scope="col">Sub Assignment4</th>
        </tr>
        </thead>
        <tbody>
';
    while($row = $res->fetch_assoc()) {
        $content .= '<tr>';
        $content .= '<td>' .$row["group_name"] .' </td>';
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