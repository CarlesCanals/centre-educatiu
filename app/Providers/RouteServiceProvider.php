<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * L'arrel de l'espai de noms per als controladors de l'aplicació.
     *
     * Aquest espai de noms s'aplicarà automàticament a les rutes dels controladors, així com a la URL generator.
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Defineix els paràmetres de la ruta d'API i web.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Defineix les rutes de l'aplicació.
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        // Si tens altres grups de rutes, pots definir-los aquí.
    }

    /**
     * Defineix les rutes de l'API.
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Defineix les rutes web.
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
}
