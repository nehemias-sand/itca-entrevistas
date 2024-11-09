<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Entrevista\CreateEntrevistaRequest;
use App\Http\Resources\EntrevistaResource;
use App\Services\EntrevistaService;
use Illuminate\Support\Facades\Auth;

class EntrevistaController extends Controller
{
    public function __construct(
        private EntrevistaService $entrevistaService
    ) {}

    public function register(CreateEntrevistaRequest $request)
    {
        $docente = Auth::user()->docente;
        if (!$docente) return ApiResponseClass::sendResponse(null, "El usuario no está asociado a un docente", 400);

        $entrevistaData = $request->only([
            'aprobada',
            'observaciones',
            'id_estudiante',
            'id_ciclo',
            'id_catalogo',
            'id_carrera'
        ]);

        $entrevistaData['id_docente'] = $docente->id;
        $seguimientoData = $request->input('seguimientos');

        $entrevista = $this->entrevistaService->registrarEntrevista($entrevistaData, $seguimientoData);
        $entrevista->load('docente', 'estudiante');

        return ApiResponseClass::sendResponse(new EntrevistaResource($entrevista));
    }
}
