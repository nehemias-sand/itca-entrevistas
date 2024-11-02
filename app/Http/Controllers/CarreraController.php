<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Carrera\CreateCarreraRequest;
use App\Http\Requests\Carrera\UpdateCarreraRequest;
use App\Http\Resources\CarreraResource;
use App\Services\CarreraService;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function __construct(
        private CarreraService $carreraService
    ) {}

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'perPage' => 10
        ], $request->only(['paginate', 'perPage']));

        $filter = $request->only(['nombre']);

        $data = $this->carreraService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(CarreraResource::collection($data));
    }

    public function show($id)
    {
        $carrera = $this->carreraService->show($id);
        if (!$carrera) return ApiResponseClass::sendResponse(null, "Carrera con ID $id no encontrada", 404);

        return ApiResponseClass::sendResponse(new CarreraResource($carrera));
    }

    public function store(CreateCarreraRequest $request)
    {
        $carrera = $request->only([
            'nombre',
            'id_facultad',
        ]);

        $seguimientos = $request->input('seguimientos');

        $newCarrera = $this->carreraService->store(compact('carrera', 'seguimientos'));
        return ApiResponseClass::sendResponse(new CarreraResource($newCarrera), null, 201);
    }

    public function update($id, UpdateCarreraRequest $request)
    {
        $carrera = $request->only([
            'nombre',
            'id_facultad',
        ]);

        $seguimientos = $request->input('seguimientos');

        $updatedCarrera = $this->carreraService->update($id, compact('carrera', 'seguimientos'));
        if (!$updatedCarrera) return ApiResponseClass::sendResponse(null, "Carrera con ID $id no encontrada", 404);

        return ApiResponseClass::sendResponse(new CarreraResource($updatedCarrera));
    }

    public function delete($id)
    {
        $carrera = $this->carreraService->delete($id);
        if (!$carrera) return ApiResponseClass::sendResponse(null, "Carrera con ID $id no encontrada", 404);

        return ApiResponseClass::sendResponse(new CarreraResource($carrera));
    }
}
