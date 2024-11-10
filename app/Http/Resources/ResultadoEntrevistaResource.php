<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultadoEntrevistaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'aprobada' => $this->aprobada,
            'observaciones' => $this->observaciones,
            'docente' => [
                'id' => $this->docente->id,
                'carnet' => $this->docente->carnet,
                'nombre_completo' => $this->docente->nombres . ' ' . $this->docente->apellidos,
            ],
            'estudiante' => [
                'id' => $this->estudiante->id,
                'nombre_completo' => $this->estudiante->nombres . ' ' . $this->estudiante->apellidos,
            ],
            'carrera' => [
                'id' => $this->carrera->id,
                'nombre' => $this->carrera->nombre,
            ],
            'ciclo' => [
                'id' => $this->ciclo->id,
                'codigo' => $this->ciclo->codigo,
            ],
            'preguntas' => $this->preguntas->map(function ($pregunta) {
                return [
                    'id' => $pregunta->id,
                    'enunciado' => $pregunta->enunciado,
                    'respuesta' => $pregunta->pivot->respuesta,
                ];
            }),
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'aprobada' => $this->aprobada,
            'observaciones' => $this->observaciones,
            'docente' => new DocenteResource($this->whenLoaded('docente')),
            'estudiante' => new EstudianteResource($this->whenLoaded('estudiante')),
            'preguntas' => $this->preguntas,
        ];
    }
}
