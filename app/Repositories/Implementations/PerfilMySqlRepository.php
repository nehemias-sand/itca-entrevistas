<?php

namespace App\Repositories\Implementations;

use App\Models\Perfil;
use App\Repositories\PerfilRepositoryInterface;

class PerfilMySqlRepository implements PerfilRepositoryInterface
{
    public function index(){
        return Perfil::all();
    }
}
