<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
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

    public function getAllCargos() {
        $cargos = $this->cargoService->getAll();
        return ApiResponseClass::sendResponse($cargos, null, 200);
    }

    public function getAllFacultades() {
        $facultades = $this->facultadService->getAll();
        return ApiResponseClass::sendResponse($facultades, null, 200);
    }

    public function getAllJornadas() {
        $jornadas = $this->jornadaService->getAll();
        return ApiResponseClass::sendResponse($jornadas, null, 200);
    }

    public function getAllModalidades() {
        $modalidades = $this->modalidadService->getAll();
        return ApiResponseClass::sendResponse($modalidades, null, 200);
    }

    public function getAllPerfiles() {
        $perfiles = $this->perfilService->getAll();
        return ApiResponseClass::sendResponse($perfiles, null, 200);
    }

    public function getAllRegionales() {
        $regionales = $this->regionalService->getAll();
        return ApiResponseClass::sendResponse($regionales, null, 200);
    }

    public function getAllTiposRespuesta() {
        $tiposRespuesta = $this->tipoRespuestaService->getAll();
        return ApiResponseClass::sendResponse($tiposRespuesta, null, 200);
    }
}
