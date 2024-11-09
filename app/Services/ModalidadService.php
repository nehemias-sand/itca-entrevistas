<?php

namespace App\Services;

use App\Repositories\ModalidadRepositoryInterface;

class ModalidadService
{
    public function __construct(
        private ModalidadRepositoryInterface $modalidadRepositoryInterface
    ) {}

    public function index()
    {
        return $this->modalidadRepositoryInterface->index();
    }
}
