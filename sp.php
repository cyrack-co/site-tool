<?php
function dophpfile($path){
    $contents = '';
    ob_start();
    include_once($path);
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
}
echo file_get_contents("template/sp/header.php");
if (substr($_SERVER['REQUEST_URI'], -1) == "/") {
    $url = substr($_SERVER['REQUEST_URI'], 0, -1);
} else {
    $url = $_SERVER['REQUEST_URI'];
}
if (file_exists("page$url")) {
    echo dophpfile("page$url");
} else {
    echo dophpfile("template/sp/error/404.php");
}
echo file_get_contents("template/sp/footer.php");
