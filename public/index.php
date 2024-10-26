<?php

use app\Controllers\UserControllers;

require_once __DIR__ . '/../vendor/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
var_dump($uri);
switch ($uri) {
    case '/app1/public/register':
        $controller = new UserControllers();
        $controller->register();
        break;
    case '/app1/public/login' :
        $controller = new UserControllers();
        $controller->login();
        break;
    default: echo "error routing ((";
}

