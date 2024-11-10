<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstudianteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'nombre_completo' => $this->nombres . ' ' . $this->apellidos,
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
                        'telefono' => $seguimientoCarrera->regional->telefono,
                    ],
                    'evaluado' => $seguimientoCarrera->pivot->evaluado
                ];
            })
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'nombre_completo' => $this->nombres . ' ' . $this->apellidos,
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
                        'telefono' => $seguimientoCarrera->regional->telefono,
                    ],
                    'evaluado' => $seguimientoCarrera->pivot->evaluado
                ];
            })
        ];
    }
}
