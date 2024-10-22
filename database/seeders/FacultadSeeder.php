<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facultades')->insert([
            [
                'codigo' => 'EDU_DUAL',
                'nombre' => 'EDUCACIÓN DUAL',
            ],
            [
                'codigo' => 'ING_ELEC',
                'nombre' => 'INGENIERÍA ELÉCTRICA Y ELECTRÓNICA',
            ],
            [
                'codigo' => 'ING_CIV_ARQ',
                'nombre' => 'INGENIERÍA CIVIL Y ARQUITECTURA',
            ],
            [
                'codigo' => 'ING_COMP',
                'nombre' => 'INGENIERÍA EN COMPUTACIÓN',
            ],
            [
                'codigo' => 'ING_MECAT',
                'nombre' => 'INGENIERÍA MECATRÓNICA',
            ],
            [
                'codigo' => 'ING_AUTOM',
                'nombre' => 'INGENIERÍA AUTOMOTRIZ',
            ],
            [
                'codigo' => 'TEC_ALIM',
                'nombre' => 'TECNOLOGÍA EN ALIMENTOS',
            ],
            [
                'codigo' => 'ING_QUIM',
                'nombre' => 'INGENIERÍA QUÍMICA',
            ],
        ]);
    }
}
