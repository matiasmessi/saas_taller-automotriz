<?php

define('LARAVEL_START', microtime(true));

// 💡 REDIRECCIÓN PARA VERCEL: Forzamos las cachés de paquetes a /tmp antes del arranque
$_ENV['APP_SERVICES_CACHE_PATH'] = '/tmp/services.php';
$_ENV['APP_PACKAGES_CACHE_PATH'] = '/tmp/packages.php';
putenv('APP_SERVICES_CACHE_PATH=/tmp/services.php');
putenv('APP_PACKAGES_CACHE_PATH=/tmp/packages.php');

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