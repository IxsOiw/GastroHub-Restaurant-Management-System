<?php

namespace Ixsaiw\Bistro;

$URI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URI = rtrim($URI, '/') ?: '';

$routes = require __DIR__ . '/config/routes.php';

function routeToController($URI, $routes, $config)
{
    if (array_key_exists($URI, $routes)) {
        [$controllerClass, $method] = $routes[$URI];

        $controller = new $controllerClass($config);
        $controller->$method();
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
