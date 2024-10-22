<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modalidades')->insert([
            [
                'nombre' => 'Presencial',
            ],
            [
                'nombre' => 'Semipresencial',
            ],
            [
                'nombre' => 'Dual',
            ],
        ]);
    }
}
