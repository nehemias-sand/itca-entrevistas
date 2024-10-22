<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cargos')->insert([
            [
                'nombre' => 'Coordinador',
            ],
            [
                'nombre' => 'Docente Hora Clase',
            ],
            [
                'nombre' => 'Docente Permanente',
            ],
        ]);
    }
}
