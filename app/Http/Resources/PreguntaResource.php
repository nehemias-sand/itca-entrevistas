<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PreguntaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'enunciado' => $this->enunciado,
            'tipoRespuesta' => $this->tipoRespuesta->nombre,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'enunciado' => $this->enunciado,
            'tipoRespuesta' => $this->tipoRespuesta->nombre,
        ];
    }
}
