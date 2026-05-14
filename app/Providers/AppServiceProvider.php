<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
        {
            // 1. Intentar dar permisos de escritura a la base de datos
            try {
                chmod(database_path('database.sqlite'), 0666);
            } catch (\Exception $e) {
                // Si falla, que continúe para no romper la app
            }

            // 2. Ejecutar las migraciones automáticamente
            \Illuminate\Support\Facades\Artisan::call('migrate --force');

            // 3. Forzar HTTPS para que carguen los estilos
            if (app()->environment('production') || env('APP_ENV') === 'production') {
                \Illuminate\Support\Facades\URL::forceScheme('https');
            }
        }

}
