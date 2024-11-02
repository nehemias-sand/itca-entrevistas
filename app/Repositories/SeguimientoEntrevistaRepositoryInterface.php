<?php

namespace App\Repositories;

interface SeguimientoEntrevistaRepositoryInterface
{
    public function create(array $data);

    public function findByEntrevistaId($entrevistaId);
}
