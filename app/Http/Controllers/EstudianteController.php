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
            'perPage' => 10
        ], $request->only(['paginate', 'perPage']));

        $filter = $request->only(['nombresOrApellidos']);

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

    public function update($id, UpdateEstudianteRequest $request)
    {
        $data = $request->only([
            'nombres',
            'apellidos',
            'correo',
            'id_carrera',
            'id_jornada',
            'id_modalidad',
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
