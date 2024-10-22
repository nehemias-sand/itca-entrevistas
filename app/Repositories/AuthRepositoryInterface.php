<?php

namespace App\Repositories;

interface AuthRepositoryInterface
{
    public function register(array $data);
    public function update(int $id, array $data);
}
