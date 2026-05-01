<?php

namespace Ixsaiw\Bistro;

$URI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URI = str_replace('/websites/bistro/public', '', $URI);
$URI = rtrim($URI, '/') ?: '';

$routes = require __DIR__ . '/config/routes.php';

function routeToController($URI, $routes, $config)
{
    if (array_key_exists($URI, $routes)) {
        $controllerClass = $routes[$URI];
        $controller = new $controllerClass($config);
        $controller->index();
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require __DIR__ . "/../views/{$code}.php";
    die();
}

routeToController($URI, $routes, $config);
