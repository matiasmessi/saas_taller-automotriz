<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL; // Importamos la fachada URL
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Evita errores de longitud de índice en versiones antiguas de MySQL.
        Schema::defaultStringLength(191);

        // Fuerza a que asset(), route() y todo enlace generado por Laravel use HTTPS
        URL::forceScheme('https');
    }
}