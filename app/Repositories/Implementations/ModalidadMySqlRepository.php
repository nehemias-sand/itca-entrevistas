<?php

namespace App\Repositories\Implementations;

use App\Models\Modalidad;
use App\Repositories\ModalidadRepositoryInterface;

class ModalidadMySqlRepository implements ModalidadRepositoryInterface
{
    public function index(){
        return Modalidad::all();
    }
}
