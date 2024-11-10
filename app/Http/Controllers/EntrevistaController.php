<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Exports\EntrevistaExport;
use Illuminate\Http\Request;
use App\Http\Requests\Entrevista\CreateEntrevistaRequest;
use App\Http\Resources\EntrevistaResource;
use App\Http\Resources\ResultadoEntrevistaResource;
use App\Services\EntrevistaService;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class EntrevistaController extends Controller
{
    public function __construct(
        private EntrevistaService $entrevistaService
    ) {}

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['id_ciclo']);

        $data = $this->entrevistaService->index($pagination, $filter);

        return ApiResponseClass::sendResponse(ResultadoEntrevistaResource::collection($data));
    }

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

    public function exportEntrevistas(Request $request)
    {
        $idPerfil = Auth::user()->id_perfil;
        $idCicloQuery = $request->query('id_ciclo');

        $idCiclo = $idCicloQuery ? $idCicloQuery : null;
        $idDocente = $idPerfil === 2 ? Auth::user()->docente->id : null;

        $response = Excel::download(new EntrevistaExport($idCiclo, $idDocente), 'entrevistas.xlsx');
        $archivoExcel = $response->getFile();
        $contenidoExcel = file_get_contents($archivoExcel);
        $xlsData = base64_encode($contenidoExcel);


        $response = [
            'file' => "data:application/vnd.ms-excel;base64," . $xlsData
        ];
        unlink($archivoExcel);
        return response()->json($response);
    }
}
