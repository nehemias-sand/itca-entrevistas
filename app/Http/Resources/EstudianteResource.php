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
            'correo' => $this->correo,
            'seguimientos_carrera' => $this->carreras->map(function ($seguimientoCarrera) {
                return [
                    'id' => $seguimientoCarrera->id,
                    'carrera' => [
                        'id' => $seguimientoCarrera->carrera->id,
                        'nombre' => $seguimientoCarrera->carrera->nombre,
                    ],
                    'jornada' => [
                        'id' => $seguimientoCarrera->jornada->id,
                        'nombre' => $seguimientoCarrera->jornada->nombre,
                    ],
                    'modalidad' => [
                        'id' => $seguimientoCarrera->modalidad->id,
                        'nombre' => $seguimientoCarrera->modalidad->nombre,
                    ],
                    'regional' => [
                        'id' => $seguimientoCarrera->regional->id,
                        'nombre' => $seguimientoCarrera->regional->nombre,
                    ],
                    'activo' => $seguimientoCarrera->pivot->activo
                ];
            })
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'carreras' => $this->carreras
        ];
    }
}
