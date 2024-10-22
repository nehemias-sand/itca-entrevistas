<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Pregunta\CreatePreguntaRequest;
use App\Http\Requests\Pregunta\UpdatePreguntaRequest;
use App\Http\Resources\PreguntaResource;
use App\Services\PreguntaService;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function __construct(
        private PreguntaService $preguntaService
    ) {}

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'perPage' => 10
        ], $request->only(['paginate', 'perPage']));

        $data = $this->preguntaService->index($pagination, []);
        return ApiResponseClass::sendResponse(PreguntaResource::collection($data));
    }

    public function show($id)
    {
        $pregunta = $this->preguntaService->show($id);
        if (!$pregunta) return ApiResponseClass::sendResponse(null, "Pregunta con ID $id no encontrada", 404);

        return ApiResponseClass::sendResponse(new PreguntaResource($pregunta));
    }

    public function store(CreatePreguntaRequest $request) {
        $data = $request->only([
            'enunciado',
            'id_tipo_respuesta',
        ]);

        $pregunta = $this->preguntaService->store($data);
        return ApiResponseClass::sendResponse(new PreguntaResource($pregunta), null, 201);
    }

    public function update($id, UpdatePreguntaRequest $request)
    {
        $data = $request->only([
            'enunciado',
            'id_tipo_respuesta',
        ]);

        $pregunta = $this->preguntaService->update($id, $data);
        if (!$pregunta) return ApiResponseClass::sendResponse(null, "Pregunta con ID $id no encontrada", 404);

        return ApiResponseClass::sendResponse(new PreguntaResource($pregunta));
    }

    public function delete($id)
    {
        $pregunta = $this->preguntaService->delete($id);
        if (!$pregunta) return ApiResponseClass::sendResponse(null, "Pregunta con ID $id no encontrada", 404);

        return ApiResponseClass::sendResponse(new PreguntaResource($pregunta));
    }
}
