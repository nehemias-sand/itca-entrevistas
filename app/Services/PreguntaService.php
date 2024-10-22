<?php

namespace App\Services;

use App\Repositories\PreguntaRepositoryInterface;

class PreguntaService
{
    public function __construct(
        private PreguntaRepositoryInterface $preguntaRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter) {
        return $this->preguntaRepositoryInterface->index($pagination, $filter);
    }

    public function show($id) {
        return $this->preguntaRepositoryInterface->show($id);
    }

    public function store(array $data) {
        return $this->preguntaRepositoryInterface->store($data);
    }

    public function update($id, array $data) {
        return $this->preguntaRepositoryInterface->update($id, $data);
    }

    public function delete($id) {
        return $this->preguntaRepositoryInterface->delete($id);
    }
}
