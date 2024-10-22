<?php

namespace App\Providers;

use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CarreraRepositoryInterface;
use App\Repositories\CatalogoPreguntaRepositoryInterface;
use App\Repositories\CicloRepositoryInterface;
use App\Repositories\EstudianteRepositoryInterface;
use App\Services\AuthService;
use App\Services\CarreraService;
use App\Services\CatalogoPreguntaService;
use App\Services\CicloService;
use App\Services\EstudianteService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthService($app->make(AuthRepositoryInterface::class));
            return new CicloService($app->make(CicloRepositoryInterface::class));
            return new EstudianteService($app->make(EstudianteRepositoryInterface::class));
            return new CatalogoPreguntaService($app->make(CatalogoPreguntaRepositoryInterface::class));
            return new CarreraService($app->make(CarreraRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
