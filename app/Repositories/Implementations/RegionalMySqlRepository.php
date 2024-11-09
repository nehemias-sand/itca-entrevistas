<?php

namespace App\Repositories\Implementations;

use App\Models\Regional;
use App\Repositories\RegionalRepositoryInterface;

class RegionalMySqlRepository implements RegionalRepositoryInterface
{
    public function index(){
        return Regional::all();
    }
}
