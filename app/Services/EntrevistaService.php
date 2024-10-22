<?php

namespace App\Services;

use App\Repositories\EntrevistaRepositoryInterface;

class EntrevistaService
{
    public function __construct(
        private EntrevistaRepositoryInterface $entrevistaRepositoryInterface,
        private SeguimientoEntrevistaRepositoryInterface $seguimientoEntrevistaRepositoryInterface
    ) {}
}
