<?php

namespace App\Services;

use App\Repositories\FacultadRepositoryInterface;

class FacultadService
{
    public function __construct(
        private FacultadRepositoryInterface $facultadRepositoryInterface
    ) {}

    public function index(){
        return $this->facultadRepositoryInterface->index();
    }
}
