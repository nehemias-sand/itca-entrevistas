<?php

namespace App\Repositories\Implementations;

use App\Models\Facultad;
use App\Repositories\FacultadRepositoryInterface;

class FacultadMySqlRepository implements FacultadRepositoryInterface
{
    public function index(){
        return Facultad::all();
    }
}
