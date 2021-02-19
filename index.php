<?php
require_once "config.php";

$req = explode('?', $_SERVER['REQUEST_URI']);
$reqUri = explode("/", $req[0]);
array_splice($reqUri, 0, 1);
$type = $reqUri[0];
$slug = $reqUri[1];
$json = [];
if ($type == "unsubscribe") {
    $content = file_get_contents("https://best-bride.com/api/unsubscribe?" . http_build_query([
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        ]));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit('');
}

header("Location: /1");