<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarreraResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'facultad' => $this->facultad->nombre
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'facultad' => $this->facultad->nombre
        ];
    }
}
