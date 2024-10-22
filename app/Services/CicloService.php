<?php

namespace App\Services;

use App\Repositories\CicloRepositoryInterface;

class CicloService
{
    public function __construct(
        private CicloRepositoryInterface $cicloRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter) {
        return $this->cicloRepositoryInterface->index($pagination, $filter);
    }

    public function show($id) {
        return $this->cicloRepositoryInterface->show($id);
    }

    public function store(array $data) {
        return $this->cicloRepositoryInterface->store($data);
    }

    public function update($id, array $data) {
        return $this->cicloRepositoryInterface->update($id, $data);
    }

    public function delete($id) {
        return $this->cicloRepositoryInterface->delete($id);
    }
}
