<?php

namespace App\Repositories\Implementations;

use App\Models\Cargo;
use App\Repositories\CargoRepositoryInterface;

class CargoMySqlRepository implements CargoRepositoryInterface
{
    public function getAll(){
        return Cargo::all();
    }
}
