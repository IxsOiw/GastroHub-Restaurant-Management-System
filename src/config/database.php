<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

return  [
  'database' => [

    'host' => 'localhost',
    'port' => 8889,
    'dbname' => 'bistro',
    'charset' => 'utf8mb4'

  ]
];
