<?php

namespace App\Services;

use App\Repositories\CargoRepositoryInterface;

class CargoService
{
    public function __construct(
        private CargoRepositoryInterface $cargoRepositoryInterface
    ) {}

    public function getAll(){
        return $this->cargoRepositoryInterface->getAll();
    } 
}
