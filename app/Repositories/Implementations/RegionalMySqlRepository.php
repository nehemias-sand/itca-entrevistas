<?php

namespace App\Repositories\Implementations;

use App\Models\Regional;
use App\Repositories\RegionalRepositoryInterface;

class RegionalMySqlRepository implements RegionalRepositoryInterface
{
    public function getAll(){
        return Regional::all();
    }
}
