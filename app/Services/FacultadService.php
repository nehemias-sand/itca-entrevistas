<?php

namespace App\Services;

use App\Repositories\FacultadRepositoryInterface;

class FacultadService
{
    public function __construct(
        private FacultadRepositoryInterface $facultadRepositoryInterface
    ) {}

    public function getAll(){
        return $this->facultadRepositoryInterface->getAll();
    }
}
