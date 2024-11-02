<?php

namespace App\Services;

use App\Repositories\ModalidadRepositoryInterface;

class ModalidadService
{
    public function __construct(
        private ModalidadRepositoryInterface $modalidadRepositoryInterface
    ) {}

    public function getAll()
    {
        return $this->modalidadRepositoryInterface->getAll();
    }
}
