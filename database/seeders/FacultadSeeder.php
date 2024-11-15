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
             [
                'codigo' => 'Megatec',
                'nombre' => 'Dirección de la Escuela Especializada en Ingeniería ITCA-FEPADE Centro Regional Santa Ana. Dirección Programa MEGATEC.',
            ],
             [
                'codigo' => 'ESC_TUR',
                'nombre' => 'Escuela de Hostelería y Turismo',
            ],
             [
                'codigo' => 'ESC_PORT',
                'nombre' => 'Escuela de Administración y Operación Portuaria',
            ],
            [
                'codigo' => 'ESC_ACUIC',
                'nombre' => 'Escuela de Ciencias del Mar',
            ],
            [
                'codigo' => 'ESC_ADUA',
                'nombre' => 'Escuela de Logística, Aduanas y Puertos',
            ],
        ]);
    }
}
