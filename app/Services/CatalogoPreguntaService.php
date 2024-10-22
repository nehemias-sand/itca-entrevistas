<?php

namespace App\Services;

use App\Repositories\CatalogoPreguntaRepositoryInterface;

class CatalogoPreguntaService
{
    public function __construct(
        private CatalogoPreguntaRepositoryInterface $catalogoPreguntaRepositoryInterface
    ) {}

    public function index(array $pagination, array $filter) {
        return $this->catalogoPreguntaRepositoryInterface->index($pagination, $filter);
    }

    public function show($id) {
        return $this->catalogoPreguntaRepositoryInterface->show($id);
    }

    public function store(array $data) {
        return $this->catalogoPreguntaRepositoryInterface->store($data);
    }

    public function update($id, array $data) {
        return $this->catalogoPreguntaRepositoryInterface->update($id, $data);
    }

    public function delete($id) {
        return $this->catalogoPreguntaRepositoryInterface->delete($id);
    }
}
