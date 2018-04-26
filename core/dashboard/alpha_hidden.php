<?php
require_once (__DIR__."/../config.php");
require_once (__DIR__."/../inc/secure_session.php");
require_once (__DIR__."/../functions.php");
require_once (__DIR__."/../inc/database_api.php");

$page['title'] = "alpha_hidden";
require_once (__DIR__."/../template/header.php");
require_once (__DIR__."/../template/navbar.php");

$header = "alpha_hidden";

$page_content = file_get_contents(__DIR__."/../../".TEMPLATE_FOLDER."/dashboard/alpha_display_username.html");


//--Content part--//
$content = "";
$content .= "
<label class=\"switch\">
  <input type=\"checkbox\">
  <span class=\"slider\"></span>
</label>
";
//----------------//

$replacers = [
    'TEMPLATE_DIR' => TEMPLATE_FOLDER,
    'PAGE_TITLE' => $page['title'],
    'HEADER' => $header,
    'CONTENT' => $content
];

echo preg_replace_callback("|{(\w*)}|", 'replace_callback', $page_content);

?>