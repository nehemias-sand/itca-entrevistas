<?php

namespace App\Repositories\Implementations;

use App\Models\Jornada;
use App\Repositories\JornadaRepositoryInterface;

class JornadaMySqlRepository implements JornadaRepositoryInterface
{
    public function index(){
        return Jornada::all();
    }
}
