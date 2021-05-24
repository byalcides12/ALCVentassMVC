<?php

use Dotenv\Dotenv;
use Libs\Core;

require_once '../vendor/autoload.php';

//require_once '../libs/core.php';
require_once '../config/config.php';
//require_once '../libs/controller.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$core =new Core();