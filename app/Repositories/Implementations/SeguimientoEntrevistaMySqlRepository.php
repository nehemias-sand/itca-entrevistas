<?php

namespace App\Repositories\implementations;

use App\Models\SeguimientoEntrevista;
use App\Repositories\SeguimientoEntrevistaRepositoryInterface;

class SeguimientoEntrevistaMySqlRepository implements SeguimientoEntrevistaRepositoryInterface
{
    public function create(array $data)
    {
        return SeguimientoEntrevista::create($data);
    }

    public function findByEntrevistaId($entrevistaId)
    {
        return SeguimientoEntrevista::where('id_entrevista', $entrevistaId)->get();
    }
}
