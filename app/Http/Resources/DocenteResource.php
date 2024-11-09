<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocenteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'carnet' => $this->carnet,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'nombre_completo' => $this->nombres . ' ' . $this->apellidos,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'carnet' => $this->carnet,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'nombre_completo' => $this->nombres . ' ' . $this->apellidos,
        ];
    }
}
