<?php

namespace App\Repositories\Implementations;

use App\Models\Modalidad;

class ModalidadMySqlRepository
{
    public function getAll(){
        return Modalidad::all();
    }
}
