<?php

namespace App\Repositories\Implementations;

use App\Models\TipoRespuesta;
use App\Repositories\TipoRespuestaRepositoryInterface;

class TipoRespuestaMySqlRepository implements TipoRespuestaRepositoryInterface
{
    public function getAll(){
        return TipoRespuesta::all();
    }
}
