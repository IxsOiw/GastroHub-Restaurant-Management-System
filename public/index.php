<?php

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../src/config/database.php';


require __DIR__ . '/../src/Router.php';
