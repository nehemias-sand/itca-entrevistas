<?php

namespace App\Repositories\Implementations;

use App\Models\User;
use App\Repositories\AuthRepositoryInterface;

class AuthMySqlRepository implements AuthRepositoryInterface
{
    public function index(array $pagination, array $filter)
    {
        $usuarios = User::query();

        if (isset($filter['email'])) {
            $usuarios->where('email', 'like', '%' . $filter['email'] . '%');
        }

        if ($pagination['paginate']  === 'true') {
            return $usuarios->paginate($pagination['per_page']);
        }

        return $usuarios->get();
    }

    public function register(array $data) {
        return User::create($data);
    }

    public function update(int $id, array $data) {
        $user = User::find($id);
        if(!$user) return null;
        
        $user->update($data);
        return $user;
    }

    public function changeEstado(int $id) {
        $user = User::find($id);
        if(!$user) return null;
        
        $estado = !$user->activo;

        $user->update(['activo' => $estado]);
        return $user;
    }
}
