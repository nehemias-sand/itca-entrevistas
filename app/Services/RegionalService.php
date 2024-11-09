<?php

namespace App\Services;

use App\Repositories\RegionalRepositoryInterface;

class RegionalService
{
    public function __construct(
        private RegionalRepositoryInterface $regionalRepositoryInterface
    ) {}

    public function index()
    {
        return $this->regionalRepositoryInterface->index();
    }
}
