<?php

namespace App\Repositories;

interface EntrevistaRepositoryInterface
{
    public function index(array $pagination, array $filter);
    
    public function create(array $data);

    public function findById($id);
}
