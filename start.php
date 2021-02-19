<?php
define("OWN_DOMAIN", "https://best-bride.com");

function initPreland(){
    $_SERVER['REQUEST_URI'] = preg_replace("/^\/[0-9]+\//", "/", $_SERVER['REQUEST_URI']);
    $req = explode('?', $_SERVER['REQUEST_URI']);
    $reqUri = explode("/", $req[0]);
    array_splice($reqUri, 0, 1);
    $type = $reqUri[0];
    $slug = $reqUri[1];
    if($type == "unsubscribe"){
        $content = file_get_contents(OWN_DOMAIN . "/api/unsubscribe?" . http_build_query([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            ]));
        header("Location: /");
        exit('');
    }

    return [$type, $slug];
}