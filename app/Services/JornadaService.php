<?php

namespace App\Services;

use App\Repositories\JornadaRepositoryInterface;

class JornadaService
{
    public function __construct(
        private JornadaRepositoryInterface $jornadaRepositoryInterface
    ) {}

    public function getAll()
    {
        return $this->jornadaRepositoryInterface->getAll();
    }
}
