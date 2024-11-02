<?php

namespace App\Services;

use App\Repositories\TipoRespuestaRepositoryInterface;

class TipoRespuestaService
{
    public function __construct(
        private TipoRespuestaRepositoryInterface $tipoRespuestaRepositoryInterface
    ) {}

    public function getAll()
    {
        return $this->tipoRespuestaRepositoryInterface->getAll();
    }
}
