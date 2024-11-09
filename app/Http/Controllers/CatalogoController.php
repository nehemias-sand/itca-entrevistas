<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\CargoResource;
use App\Http\Resources\FacultadResource;
use App\Http\Resources\JornadaResource;
use App\Http\Resources\ModalidadResource;
use App\Http\Resources\PerfilResource;
use App\Http\Resources\RegionalResource;
use App\Http\Resources\TipoRespuestaResource;
use App\Services\CargoService;
use App\Services\FacultadService;
use App\Services\JornadaService;
use App\Services\ModalidadService;
use App\Services\PerfilService;
use App\Services\RegionalService;
use App\Services\TipoRespuestaService;

class CatalogoController extends Controller
{
    public function __construct(
        private CargoService $cargoService,
        private FacultadService $facultadService,
        private JornadaService $jornadaService,
        private ModalidadService $modalidadService,
        private PerfilService $perfilService,
        private RegionalService $regionalService,
        private TipoRespuestaService $tipoRespuestaService
    ){}

    public function indexPerfiles() {
        $perfiles = $this->perfilService->index();
        return ApiResponseClass::sendResponse(PerfilResource::collection($perfiles), null, 200);
    }

    public function indexCargos() {
        $cargos = $this->cargoService->index();
        return ApiResponseClass::sendResponse(CargoResource::collection($cargos), null, 200);
    }

    public function indexFacultades() {
        $facultades = $this->facultadService->index();
        return ApiResponseClass::sendResponse(FacultadResource::collection($facultades), null, 200);
    }

    public function indexJornadas() {
        $jornadas = $this->jornadaService->index();
        return ApiResponseClass::sendResponse(JornadaResource::collection($jornadas), null, 200);
    }

    public function indexModalidades() {
        $modalidades = $this->modalidadService->index();
        return ApiResponseClass::sendResponse(ModalidadResource::collection($modalidades), null, 200);
    }

    public function indexRegionales() {
        $regionales = $this->regionalService->index();
        return ApiResponseClass::sendResponse(RegionalResource::collection($regionales), null, 200);
    }

    public function indexTiposRespuesta() {
        $tiposRespuesta = $this->tipoRespuestaService->index();
        return ApiResponseClass::sendResponse(TipoRespuestaResource::collection($tiposRespuesta), null, 200);
    }
}
