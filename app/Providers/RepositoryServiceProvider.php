<?php

namespace App\Providers;

use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CarreraRepositoryInterface;
use App\Repositories\CatalogoPreguntaRepositoryInterface;
use App\Repositories\CicloRepositoryInterface;
use App\Repositories\EntrevistaRepositoryInterface;
use App\Repositories\EstudianteRepositoryInterface;

use App\Repositories\Implementations\AuthMySqlRepository;
use App\Repositories\Implementations\CarreraMySqlRepository;
use App\Repositories\implementations\CatalogoPreguntaMySqlRepository;
use App\Repositories\implementations\CicloMySqlRepository;
use App\Repositories\implementations\EntrevistaMySqlRepository;
use App\Repositories\implementations\EstudianteMySqlRepository;
use App\Repositories\implementations\PreguntaMySqlRepository;
use App\Repositories\implementations\SeguimientoEntrevistaMySqlRepository;
use App\Repositories\PreguntaRepositoryInterface;
use App\Repositories\SeguimientoEntrevistaRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthMySqlRepository::class);
        $this->app->bind(CicloRepositoryInterface::class, CicloMySqlRepository::class);
        $this->app->bind(EstudianteRepositoryInterface::class, EstudianteMySqlRepository::class);
        $this->app->bind(PreguntaRepositoryInterface::class, PreguntaMySqlRepository::class);
        $this->app->bind(CatalogoPreguntaRepositoryInterface::class, CatalogoPreguntaMySqlRepository::class);
        $this->app->bind(EntrevistaRepositoryInterface::class, EntrevistaMySqlRepository::class);
        $this->app->bind(SeguimientoEntrevistaRepositoryInterface::class, SeguimientoEntrevistaMySqlRepository::class);
        $this->app->bind(CarreraRepositoryInterface::class, CarreraMySqlRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
