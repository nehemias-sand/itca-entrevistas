<?php

namespace App\Repositories\implementations;

use App\Models\Entrevista;
use App\Repositories\EntrevistaRepositoryInterface;

class EntrevistaMySqlRepository implements EntrevistaRepositoryInterface
{
    public function create(array $data)
    {
        return Entrevista::create($data);
    }

    public function findById($id)
    {
        return Entrevista::find($id);
    }
}
