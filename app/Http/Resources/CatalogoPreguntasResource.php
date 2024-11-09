<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CatalogoPreguntasResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'preguntas' => $this->preguntas->map(function ($pregunta) {
                return [
                    'id' => $pregunta->id,
                    'enunciado' => $pregunta->enunciado,
                    'tipo_respuesta' => $pregunta->tipoRespuesta->nombre,
                ];
            }),
            'ciclos' => $this->ciclos->map(function ($ciclo) {
                return [
                    'id' => $ciclo->id,
                    'codigo' => $ciclo->codigo,
                    'anio' => $ciclo->anio,
                    'numero' => $ciclo->num,
                ];
            }),
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'preguntas' => $this->preguntas,
        ];
    }
}
