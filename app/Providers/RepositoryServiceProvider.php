<?php

namespace App\Providers;

use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CargoRepositoryInterface;
use App\Repositories\CarreraRepositoryInterface;
use App\Repositories\CatalogoPreguntaRepositoryInterface;
use App\Repositories\CicloRepositoryInterface;
use App\Repositories\DocenteRepositoryInterface;
use App\Repositories\EntrevistaRepositoryInterface;
use App\Repositories\EstudianteRepositoryInterface;
use App\Repositories\FacultadRepositoryInterface;
use App\Repositories\Implementations\AuthMySqlRepository;
use App\Repositories\Implementations\CargoMySqlRepository;
use App\Repositories\Implementations\CarreraMySqlRepository;
use App\Repositories\implementations\CatalogoPreguntaMySqlRepository;
use App\Repositories\implementations\CicloMySqlRepository;
use App\Repositories\Implementations\DocenteMySqlRepository;
use App\Repositories\implementations\EntrevistaMySqlRepository;
use App\Repositories\implementations\EstudianteMySqlRepository;
use App\Repositories\Implementations\FacultadMySqlRepository;
use App\Repositories\Implementations\JornadaMySqlRepository;
use App\Repositories\Implementations\ModalidadMySqlRepository;
use App\Repositories\Implementations\PerfilMySqlRepository;
use App\Repositories\implementations\PreguntaMySqlRepository;
use App\Repositories\Implementations\RegionalMySqlRepository;
use App\Repositories\implementations\SeguimientoEntrevistaMySqlRepository;
use App\Repositories\Implementations\TipoRespuestaMySqlRepository;
use App\Repositories\JornadaRepositoryInterface;
use App\Repositories\ModalidadRepositoryInterface;
use App\Repositories\PerfilRepositoryInterface;
use App\Repositories\PreguntaRepositoryInterface;
use App\Repositories\RegionalRepositoryInterface;
use App\Repositories\SeguimientoEntrevistaRepositoryInterface;
use App\Repositories\TipoRespuestaRepositoryInterface;
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
        $this->app->bind(DocenteRepositoryInterface::class, DocenteMySqlRepository::class);
        $this->app->bind(EstudianteRepositoryInterface::class, EstudianteMySqlRepository::class);
        $this->app->bind(PreguntaRepositoryInterface::class, PreguntaMySqlRepository::class);
        $this->app->bind(CatalogoPreguntaRepositoryInterface::class, CatalogoPreguntaMySqlRepository::class);
        $this->app->bind(EntrevistaRepositoryInterface::class, EntrevistaMySqlRepository::class);
        $this->app->bind(SeguimientoEntrevistaRepositoryInterface::class, SeguimientoEntrevistaMySqlRepository::class);
        $this->app->bind(CarreraRepositoryInterface::class, CarreraMySqlRepository::class);
        $this->app->bind(CargoRepositoryInterface::class, CargoMySqlRepository::class);
        $this->app->bind(FacultadRepositoryInterface::class, FacultadMySqlRepository::class);
        $this->app->bind(JornadaRepositoryInterface::class, JornadaMySqlRepository::class);
        $this->app->bind(ModalidadRepositoryInterface::class, ModalidadMySqlRepository::class);
        $this->app->bind(PerfilRepositoryInterface::class, PerfilMySqlRepository::class);
        $this->app->bind(RegionalRepositoryInterface::class, RegionalMySqlRepository::class);
        $this->app->bind(TipoRespuestaRepositoryInterface::class, TipoRespuestaMySqlRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
