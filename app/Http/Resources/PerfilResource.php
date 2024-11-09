<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PerfilResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'acronimo' => $this->acronimo,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'acronimo' => $this->acronimo,
        ];
    }
}
