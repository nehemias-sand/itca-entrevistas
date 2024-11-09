<?php

namespace App\Repositories\Implementations;

use App\Models\Cargo;
use App\Repositories\CargoRepositoryInterface;

class CargoMySqlRepository implements CargoRepositoryInterface
{
    public function index(){
        return Cargo::all();
    }
}
