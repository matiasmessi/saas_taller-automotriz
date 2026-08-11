<?php

// 1. Mapear explícitamente los archivos esenciales desde la raíz del proyecto
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap/app.php';

// 2. Capturar y manejar la petición HTTP a través de Laravel
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());