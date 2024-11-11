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
            'usuario' => [
                'id' => $this->user->id,
                'email' => $this->user->email,
            ],
            'cargo' => [
                'id' => $this->cargo->id,
                'nombre' => $this->cargo->nombre,
            ],
            'facultad' => [
                'id' => $this->facultad->id,
                'codigo' => $this->facultad->codigo,
                'nombre' => $this->facultad->nombre,
            ],
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
            'usuario' => [
                'id' => $this->usuario->id,
                'email' => $this->usuario->email,
            ],
            'cargo' => [
                'id' => $this->cargo->id,
                'nombre' => $this->cargo->nombre,
            ],
            'facultad' => [
                'id' => $this->facultad->id,
                'codigo' => $this->facultad->codigo,
                'nombre' => $this->facultad->nombre,
            ],
        ];
    }
}
