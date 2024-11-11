<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Ciclo\CreateCicloRequest;
use App\Http\Requests\Ciclo\UpdateCicloRequest;
use App\Http\Resources\CicloResource;
use App\Services\CicloService;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    public function __construct(
        private CicloService $cicloService
    ) {}

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['codigo']);

        $data = $this->cicloService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(CicloResource::collection($data));
    }

    public function show($id)
    {
        $ciclo = $this->cicloService->show($id);
        if (!$ciclo) return ApiResponseClass::sendResponse(null, "Ciclo con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new CicloResource($ciclo));
    }

    public function store(CreateCicloRequest $request) {
        $data = $request->only([
            'codigo',
            'anio',
            'num',
        ]);

        $ciclo = $this->cicloService->store($data);
        return ApiResponseClass::sendResponse(new CicloResource($ciclo), null, 201);
    }

    public function update($id, UpdateCicloRequest $request)
    {
        $data = $request->only([
            'codigo',
            'anio',
            'num',
            'id_catalogo',
        ]);

        $ciclo = $this->cicloService->update($id, $data);
        if (!$ciclo) return ApiResponseClass::sendResponse(null, "Ciclo con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new CicloResource($ciclo));
    }

    public function delete($id)
    {
        $ciclo = $this->cicloService->delete($id);
        if (!$ciclo) return ApiResponseClass::sendResponse(null, "Ciclo con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new CicloResource($ciclo));
    }
}
