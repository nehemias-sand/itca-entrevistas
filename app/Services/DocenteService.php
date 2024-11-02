<?php

namespace App\Services;

use App\Repositories\AuthRepositoryInterface;
use App\Repositories\DocenteRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class DocenteService
{
    public function __construct(
        private DocenteRepositoryInterface $docenteRepositoryInterface,
        private AuthRepositoryInterface $authRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter) {
        return $this->docenteRepositoryInterface->index($pagination, $filter);
    }

    public function show($id) {
        return $this->docenteRepositoryInterface->show($id);
    }

    public function store(array $data) {
        return $this->docenteRepositoryInterface->store($data);
    }

    public function createUserForDocente(array $userData){
        $userData['password'] = Hash::make($userData['password']);

        return $this->authRepositoryInterface->register($userData);
    }

    public function update($id, array $data){
        return $this->docenteRepositoryInterface->update($id, $data);
    }

    public function updateUserForDocente($id, array $userData) {
        return $this->authRepositoryInterface->update($id, $userData);
    }

    public function delete($id) {
        return $this->docenteRepositoryInterface->delete($id);
    }
}
