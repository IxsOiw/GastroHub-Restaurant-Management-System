<?php

$URI = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: '';

$routes = require __DIR__ . '/../app/config/routes.php';

function routeToController($URI, $routes)
{
    if (array_key_exists($URI, $routes)) {
        require $routes[$URI];
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

routeToController($URI, $routes);
