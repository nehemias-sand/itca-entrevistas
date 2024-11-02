<?php

namespace App\Services;

use App\Repositories\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        private AuthRepositoryInterface $authRepositoryInterface
    ) {}

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->authRepositoryInterface->register($data);
    }

    public static function generatePassword()
    {
        $longitud = 10;
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $password = '';

        for ($i = 0; $i < $longitud; $i++) {
            $password .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }

        return $password;
    }

    public function updatePassword(int $id, string $password)
    {
        $data['password'] = Hash::make($password);
        return $this->authRepositoryInterface->update($id, $data);
    }
}
