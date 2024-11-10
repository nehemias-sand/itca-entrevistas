<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CicloResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $idPerfil = Auth::user()->id_perfil;

        $response = [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'anio' => $this->anio,
            'num' => $this->num,
            'catalogos' => []
        ];

        if ($idPerfil === 2) {
            $response['catalogos'] = $this->catalogos->map(function ($catalogo) {
                return [
                    'id' => $catalogo->id,
                    'nombre' => $catalogo->nombre,
                    'preguntas' => $catalogo->preguntas->map(function ($pregunta) {
                        return [
                            'id' => $pregunta->id,
                            'enunciado' => $pregunta->enunciado,
                            'tipo_respuesta' => [
                                'id' => $pregunta->tipoRespuesta->id,
                                'nombre' => $pregunta->tipoRespuesta->nombre,
                            ],
                        ];
                    })
                ];
            });
        }

        return $response;
    }

    public function toJson($options = 0)
    {
        $idPerfil = Auth::user()->id_perfil;

        $response = [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'anio' => $this->anio,
            'num' => $this->num,
            'catalogos' => []
        ];

        if ($idPerfil === 2) {
            $response['catalogos'] = $this->catalogos->map(function ($catalogo) {
                return [
                    'id' => $catalogo->id,
                    'nombre' => $catalogo->nombre,
                    'preguntas' => $catalogo->preguntas->map(function ($pregunta) {
                        return [
                            'id' => $pregunta->id,
                            'enunciado' => $pregunta->enunciado,
                            'tipo_pregunta' => [
                                'id' => $pregunta->tipoRespuesta->id,
                                'nombre' => $pregunta->tipoRespuesta->nombre,
                            ],
                        ];
                    })
                ];
            });
        }

        return $response;
    }
}
