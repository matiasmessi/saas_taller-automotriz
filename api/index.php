<?php

define('LARAVEL_START', microtime(true));

// 1. Cargar el Autoloader de Composer
require __DIR__ . '/../vendor/autoload.php';

// 2. Comprobar si la aplicación está en modo mantenimiento
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// 3. Inicializar la aplicación (¡SOLO UNA VEZ!)
$app = require_once __DIR__.'/../bootstrap/app.php';

// 4. Capturar y manejar la petición HTTP a través de Laravel
use Illuminate\Http\Request;

$app->handleRequest(Request::capture());