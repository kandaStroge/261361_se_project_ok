<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$page['title'] = "alpha_display_username";
require_once (__DIR__."/../template/header.php");
require_once (__DIR__."/../template/navbar.php");

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/dashboard/alpha_display_username.html");

$sql = "SELECT uid, username FROM tbl_members";
$result = $connect->prepare($sql);


//--Content part--//
$content = "";
//$content .= '<button type="button" class="btn btn-primary">Test</button>';

$content .= '
    <div class="container">
        <table class="table">
        <thead>
        <tr>
        <th scope="col">username</th>
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
        $content .= '<td>' .$row["username"] .' </td>';
        $content .= '<td><a href="alpha_delete.php?id='.$row["uid"].'" class="badge badge-danger">Delete</a></td>';
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
    'CONTENT' => $content
];

echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);

?>