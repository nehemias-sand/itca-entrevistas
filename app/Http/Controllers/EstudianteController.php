<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Estudiante\CreateEstudianteRequest;
use App\Http\Requests\Estudiante\UpdateEstudianteRequest;
use App\Http\Resources\EstudianteResource;
use App\Services\EstudianteService;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function __construct(
        private EstudianteService $estudianteService
    ) {}

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['nombres_or_apellidos']);

        $data = $this->estudianteService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(EstudianteResource::collection($data));
    }

    public function show($id)
    {
        $estudiante = $this->estudianteService->show($id);
        if (!$estudiante) return ApiResponseClass::sendResponse(null, "Estudiante con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new EstudianteResource($estudiante));
    }

    public function store(CreateEstudianteRequest $request)
    {
        $data = $request->only([
            'nombres',
            'apellidos',
            'correo',
            'id_carrera',
            'id_jornada',
            'id_modalidad',
            'id_regional'
        ]);

        $estudiante = $this->estudianteService->store($data);
        return ApiResponseClass::sendResponse(new EstudianteResource($estudiante), null, 201);
    }

    public function importarCSV(Request $request)
    {
        $request->validate([
            'estudiantes_csv' => 'required|file|mimes:csv,txt',
        ]);

        if (($handle = fopen($request->file('estudiantes_csv')->getRealPath(), 'r')) !== false) {
            $this->estudianteService->importarCSV($handle);
            return ApiResponseClass::sendResponse(null, null, 204);
        }
        
        return ApiResponseClass::sendResponse(null, 'No se puedo abrir el archivo', 500);
    }

    public function update($id, UpdateEstudianteRequest $request)
    {
        $data = $request->only([
            'nombres',
            'apellidos',
            'correo',
        ]);

        $estudiante = $this->estudianteService->update($id, $data);
        if (!$estudiante) return ApiResponseClass::sendResponse(null, "Estudiante con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new EstudianteResource($estudiante));
    }

    public function delete($id)
    {
        $estudiante = $this->estudianteService->delete($id);
        if (!$estudiante) return ApiResponseClass::sendResponse(null, "Estudiante con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new EstudianteResource($estudiante));
    }
}
