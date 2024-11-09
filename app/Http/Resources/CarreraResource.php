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
            'facultad' => [
                'id' => $this->facultad->id,
                'codigo' => $this->facultad->codigo,
                'nombre' => $this->facultad->nombre,
            ],
            'seguimientos' => $this->seguimientos->map(function ($seguimiento) {
                return [
                    'id' => $seguimiento->id,
                    'jornada' => [
                        'id' => $seguimiento->jornada->id,
                        'nombre' => $seguimiento->jornada->nombre
                    ],
                    'modalidad' => [
                        'id' => $seguimiento->modalidad->id,
                        'nombre' => $seguimiento->modalidad->nombre
                    ],
                    'regional' => [
                        'id' => $seguimiento->regional->id,
                        'nombre' => $seguimiento->regional->nombre
                    ],
                    'coordinador' => [
                        'id' => $seguimiento->coordinador->id,
                        'carnet' => $seguimiento->coordinador->carnet,
                        'nombres' => $seguimiento->coordinador->nombres,
                        'apellidos' => $seguimiento->coordinador->apellidos
                    ],
                ];
            }),
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'facultad' => [
                'id' => $this->facultad->id,
                'codigo' => $this->facultad->codigo,
                'nombre' => $this->facultad->nombre,
            ],
            'seguimientos' => $this->seguimientos->map(function ($seguimiento) {
                return [
                    'id' => $seguimiento->id,
                    'jornada' => [
                        'id' => $seguimiento->jornada->id,
                        'nombre' => $seguimiento->jornada->nombre
                    ],
                    'modalidad' => [
                        'id' => $seguimiento->modalidad->id,
                        'nombre' => $seguimiento->modalidad->nombre
                    ],
                    'regional' => [
                        'id' => $seguimiento->regional->id,
                        'nombre' => $seguimiento->regional->nombre
                    ],
                    'coordinador' => [
                        'id' => $seguimiento->coordinador->id,
                        'carnet' => $seguimiento->coordinador->carnet,
                        'nombres' => $seguimiento->coordinador->nombres,
                        'apellidos' => $seguimiento->coordinador->apellidos
                    ],
                ];
            }),
        ];
    }
}
