<?php

namespace App\Services;

use App\Repositories\CarreraRepositoryInterface;

class CarreraService
{
    public function __construct(
        private CarreraRepositoryInterface $carreraRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter) {
        return $this->carreraRepositoryInterface->index($pagination, $filter);
    }

    public function show($id) {
        return $this->carreraRepositoryInterface->show($id);
    }

    public function store(array $data) {
        return $this->carreraRepositoryInterface->store($data);
    }

    public function update($id, array $data) {
        return $this->carreraRepositoryInterface->update($id, $data);
    }

    public function delete($id) {
        return $this->carreraRepositoryInterface->delete($id);
    }
}
