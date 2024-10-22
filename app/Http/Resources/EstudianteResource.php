<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstudianteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->email,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->email,
        ];
    }
}
