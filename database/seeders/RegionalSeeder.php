<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regionales')->insert([
            [
                'nombre' => 'Santa Tecla',
                'telefono' => '2132-7400',
            ],
            [
                'nombre' => 'Santa Ana',
                'telefono' => '2440-4348',
            ],
            [
                'nombre' => 'Zacatecoluca',
                'telefono' => '2334-0763',
            ],
            [
                'nombre' => 'Santa Miguel',
                'telefono' => '2669-2298',
            ],
            [
                'nombre' => 'La Union',
                'telefono' => '2668-4700',
            ],
        ]);
    }
}
