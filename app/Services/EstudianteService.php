<?php

namespace App\Services;

use App\Repositories\EstudianteRepositoryInterface;

class EstudianteService
{
    public function __construct(
        private EstudianteRepositoryInterface $estudianteRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter) {
        return $this->estudianteRepositoryInterface->index($pagination, $filter);
    }

    public function show($id) {
        return $this->estudianteRepositoryInterface->show($id);
    }

    public function store(array $data) {
        return $this->estudianteRepositoryInterface->store($data);
    }

    public function update($id, array $data) {
        return $this->estudianteRepositoryInterface->update($id, $data);
    }

    public function delete($id) {
        return $this->estudianteRepositoryInterface->delete($id);
    }
}
