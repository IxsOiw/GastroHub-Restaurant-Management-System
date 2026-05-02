<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

return  [
  'database' => [

    'host'      => $_ENV['DB_HOST'],
    'port'      => (int) $_ENV['DB_PORT'],
    'dbname'    => $_ENV['DB_NAME'],
    'user'      => $_ENV['DB_USER'],
    'password'  => $_ENV['DB_PASS'],
    'charset'   => 'utf8mb4'
  ]
];
