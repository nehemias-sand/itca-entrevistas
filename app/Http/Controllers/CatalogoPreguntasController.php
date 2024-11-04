<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\CatalogoPreguntas\CreateCatalogoPreguntasRequest;
use App\Http\Requests\CatalogoPreguntas\UpdateCatalogoPreguntasRequest;
use App\Http\Resources\CatalogoPreguntasResource;
use App\Services\CatalogoPreguntaService;
use Illuminate\Http\Request;

class CatalogoPreguntasController extends Controller
{
    public function __construct(
        private CatalogoPreguntaService $catalogoPreguntaService
    ) {}

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['nombre']);

        $data = $this->catalogoPreguntaService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(CatalogoPreguntasResource::collection($data));
    }

    public function show($id)
    {
        $catalogo = $this->catalogoPreguntaService->show($id);
        if (!$catalogo) return ApiResponseClass::sendResponse(null, "Catalogo con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new CatalogoPreguntasResource($catalogo));
    }

    public function store(CreateCatalogoPreguntasRequest $request) {
        $data = $request->only([
            'nombre',
            'descripcion',
            'ids_pregunta',
            'id_ciclo'
        ]);

        $catalogo = $this->catalogoPreguntaService->store($data);
        return ApiResponseClass::sendResponse(new CatalogoPreguntasResource($catalogo), null, 201);
    }

    public function update($id, UpdateCatalogoPreguntasRequest $request)
    {
        $data = $request->only([
            'nombre',
            'descripcion',
            'ids_pregunta',
            'id_ciclo'
        ]);

        $catalogo = $this->catalogoPreguntaService->update($id, $data);
        if (!$catalogo) return ApiResponseClass::sendResponse(null, "Catalogo con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new CatalogoPreguntasResource($catalogo));
    }

    public function delete($id)
    {
        $catalogo = $this->catalogoPreguntaService->delete($id);
        if (!$catalogo) return ApiResponseClass::sendResponse(null, "Catalogo con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new CatalogoPreguntasResource($catalogo));
    }
}
