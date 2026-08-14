<?php

define('LARAVEL_START', microtime(true));

// 1. Servir archivos estáticos directamente desde la carpeta /public
$publicPath = __DIR__ . '/../public';
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($uri !== '/' && file_exists($publicPath . $uri)) {
    return false; // Permite que Vercel/PHP sirva el archivo estático directo
}

// 2. Cargar el Autoloader de Composer
require __DIR__ . '/../vendor/autoload.php';

// 3. Comprobar si la aplicación está en modo mantenimiento
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// 4. Inicializar la aplicación
$app = require_once __DIR__.'/../bootstrap/app.php';

// 5. Capturar y manejar la petición HTTP a través de Laravel
use Illuminate\Http\Request;

$app->handleRequest(Request::capture());