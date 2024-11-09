<?php

namespace App\Services;

use App\Repositories\EntrevistaRepositoryInterface;
use App\Repositories\SeguimientoEntrevistaRepositoryInterface;

class EntrevistaService
{
    public function __construct(
        private EntrevistaRepositoryInterface $entrevistaRepositoryInterface,
        private SeguimientoEntrevistaRepositoryInterface $seguimientoEntrevistaRepositoryInterface
    ) {}

    public function registrarEntrevista(array $entrevistaData, array $seguimientoData)
    {
        $entrevista = $this->entrevistaRepositoryInterface->create($entrevistaData);

        foreach($seguimientoData as $seguimiento) {
            $seguimiento['id_entrevista'] = $entrevista->id;
            $this->seguimientoEntrevistaRepositoryInterface->create($seguimiento);
        }

        return $entrevista;
    }
}
