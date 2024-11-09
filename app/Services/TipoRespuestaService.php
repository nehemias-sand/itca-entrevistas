<?php

namespace App\Services;

use App\Repositories\TipoRespuestaRepositoryInterface;

class TipoRespuestaService
{
    public function __construct(
        private TipoRespuestaRepositoryInterface $tipoRespuestaRepositoryInterface
    ) {}

    public function index()
    {
        return $this->tipoRespuestaRepositoryInterface->index();
    }
}
