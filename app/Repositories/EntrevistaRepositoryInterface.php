<?php

namespace App\Repositories;

interface EntrevistaRepositoryInterface
{
    public function create(array $data);

    public function findById($id);
}
