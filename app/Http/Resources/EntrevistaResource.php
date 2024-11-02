<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntrevistaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'aprobada' => $this->aprobada,
            'observaciones' => $this->observaciones,
            'docente' => new DocenteResource($this->whenLoaded('docente')),
            'estudiante' => new EstudianteResource($this->whenLoaded('estudiante')),
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'aprobada' => $this->aprobada,
            'observaciones' => $this->observaciones,
            'docente' => new DocenteResource($this->whenLoaded('docente')),
            'estudiante' => new EstudianteResource($this->whenLoaded('estudiante')),
        ];
    }
}
