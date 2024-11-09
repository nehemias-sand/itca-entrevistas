<?php

namespace App\Services;

use App\Repositories\JornadaRepositoryInterface;

class JornadaService
{
    public function __construct(
        private JornadaRepositoryInterface $jornadaRepositoryInterface
    ) {}

    public function index()
    {
        return $this->jornadaRepositoryInterface->index();
    }
}
