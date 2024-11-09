<?php

namespace App\Services;

use App\Repositories\CargoRepositoryInterface;

class CargoService
{
    public function __construct(
        private CargoRepositoryInterface $cargoRepositoryInterface
    ) {}

    public function index(){
        return $this->cargoRepositoryInterface->index();
    } 
}
