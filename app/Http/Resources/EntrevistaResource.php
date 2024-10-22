<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntrevistaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    public function toJson($options = 0)
    {
        return [
            
        ];
    }
}
