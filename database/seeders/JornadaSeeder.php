<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JornadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jornadas')->insert([
            [
                'nombre' => 'Diurna',
            ],
            [
                'nombre' => 'Nocturna',
            ],
        ]);
    }
}
