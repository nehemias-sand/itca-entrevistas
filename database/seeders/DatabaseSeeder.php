<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call([
            PerfilSeeder::class,
            UserSeeder::class,
            CargoSeeder::class,
            RegionalSeeder::class,
            FacultadSeeder::class,
            JornadaSeeder::class,
            ModalidadSeeder::class,
            TipoRespuestaSeeder::class,
        ]);
    }
}
