<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CicloResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'año' => $this->anio,
            'num' => $this->num
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'año' => $this->anio,
            'num' => $this->num
        ];
    }
}
