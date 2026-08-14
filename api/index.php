<?php

// 1. Autoload de Composer
require __DIR__ . '/../vendor/autoload.php';

// 2. Instanciar la aplicación
$app = require_once __DIR__ . '/../bootstrap/app.php';

// ------------------------------------------------------------------
// FIX VERCEL: Redirigir la caché y el storage a la carpeta /tmp
// ------------------------------------------------------------------
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');

$app->useStoragePath('/tmp');
// ------------------------------------------------------------------

// 3. Capturar y manejar la petición
use Illuminate\Http\Request;

$app->handleRequest(Request::capture());