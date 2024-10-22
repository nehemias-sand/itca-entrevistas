<?php

namespace App\Repositories\Implementations;

use App\Models\User;
use App\Repositories\AuthRepositoryInterface;

class AuthMySqlRepository implements AuthRepositoryInterface
{
    public function register(array $data) {
        return User::create($data);
    }

    public function update(int $id, array $data) {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }
}
