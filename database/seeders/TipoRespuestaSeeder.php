<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoRespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_respuestas')->insert([
            [
                'nombre' => 'Cerrada',
            ],
            [
                'nombre' => 'Abierta',
            ],
        ]);
    }
}
