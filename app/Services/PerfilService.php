<?php

namespace App\Services;

use App\Repositories\PerfilRepositoryInterface;

class PerfilService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private PerfilRepositoryInterface $perfilRepositoryInterface
    ) {}

    public function index()
    {
        return $this->perfilRepositoryInterface->index();
    }
}
