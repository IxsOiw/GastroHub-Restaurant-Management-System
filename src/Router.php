<?php

namespace Ixsaiw\Bistro;

$URI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URI = rtrim($URI, '/') ?: '';
$METHOD = $_SERVER['REQUEST_METHOD'];

$routes = require __DIR__ . '/config/routes.php';

function routeToController($URI, $METHOD, $routes, $config)
{
    if (array_key_exists($URI, $routes)) {
        if (array_key_exists($METHOD, $routes[$URI])) {
            [$controllerClass, $method] = $routes[$URI][$METHOD];
            $controller = new $controllerClass($config);
            $controller->$method();
        } else {
            abort();
        }
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    $viewFile = __DIR__ . "/../views/{$code}.php";
    if (file_exists($viewFile)) {
        require $viewFile;
    } else {
        echo "Error {$code}";
    }
    die();
}

routeToController($URI, $METHOD, $routes, $config);
