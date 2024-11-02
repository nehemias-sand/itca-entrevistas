<?php

namespace App\Providers;

use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CargoRepositoryInterface;
use App\Repositories\CarreraRepositoryInterface;
use App\Repositories\CatalogoPreguntaRepositoryInterface;
use App\Repositories\CicloRepositoryInterface;
use App\Repositories\DocenteRepositoryInterface;
use App\Repositories\EstudianteRepositoryInterface;
use App\Repositories\FacultadRepositoryInterface;
use App\Repositories\JornadaRepositoryInterface;
use App\Repositories\ModalidadRepositoryInterface;
use App\Repositories\PerfilRepositoryInterface;
use App\Repositories\RegionalRepositoryInterface;
use App\Repositories\TipoRespuestaRepositoryInterface;
use App\Services\AuthService;
use App\Services\CargoService;
use App\Services\CarreraService;
use App\Services\CatalogoPreguntaService;
use App\Services\CicloService;
use App\Services\DocenteService;
use App\Services\EstudianteService;
use App\Services\FacultadService;
use App\Services\JornadaService;
use App\Services\ModalidadService;
use App\Services\PerfilService;
use App\Services\RegionalService;
use App\Services\TipoRespuestaService;
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
            return new DocenteService($app->make(DocenteRepositoryInterface::class), $app->make(AuthRepositoryInterface::class));
            return new EstudianteService($app->make(EstudianteRepositoryInterface::class));
            return new CatalogoPreguntaService($app->make(CatalogoPreguntaRepositoryInterface::class));
            return new CarreraService($app->make(CarreraRepositoryInterface::class));
            return new CargoService($app->make(CargoRepositoryInterface::class));
            return new FacultadService($app->make(FacultadRepositoryInterface::class));
            return new JornadaService($app->make(JornadaRepositoryInterface::class));
            return new ModalidadService($app->make(ModalidadRepositoryInterface::class));
            return new PerfilService($app->make(PerfilRepositoryInterface::class));
            return new RegionalService($app->make(RegionalRepositoryInterface::class));
            return new TipoRespuestaService($app->make(TipoRespuestaRepositoryInterface::class));
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
