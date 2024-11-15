<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    public function run()
    {
        // Insertando  carrera y id_facultad
        DB::table('carreras')->insert([
            ['nombre' => 'Técnico en Ingeniería Civil', 'id_facultad' => 3],
            ['nombre' => 'Técnico en Arquitectura', 'id_facultad' => 3],
            ['nombre' => 'Técnico en Ingeniería Eléctrica', 'id_facultad' => 2],
            ['nombre' => 'Técnico en Hardware Computacional', 'id_facultad' => 2],
            ['nombre' => 'Técnico en Energías Renovables', 'id_facultad' => 2],
            ['nombre' => 'Técnico en Ingeniería de Desarrollo de Software', 'id_facultad' => 4],
            ['nombre' => 'Técnico en Ingeniería de Infraestructura de Redes Informáticas', 'id_facultad' => 4],
            ['nombre' => 'Técnico Superior en Electrónica', 'id_facultad' => 2],
            ['nombre' => 'Técnico Superior en Logística Global', 'id_facultad' => 2],
            ['nombre' => 'Técnico en Gestión Tecnológica del Patrimonio Cultural', 'id_facultad' => 9],
            ['nombre' => 'Técnico en Hostelería y Turismo', 'id_facultad' => 10],
            ['nombre' => 'Técnico en Administración y Operación Portuaria', 'id_facultad' => 11],
            ['nombre' => 'Técnico en Manejo Integrado de Recursos Costero Marinos con Especialidad en Acuicultura y Pesquería', 'id_facultad' => 12],
            ['nombre' => 'Ingeniería Electrónica', 'id_facultad' => 2],
            ['nombre' => 'Ingeniería Mecatrónica', 'id_facultad' => 5],
            ['nombre' => 'Ingeniería en Desarrollo de Software', 'id_facultad' => 4],
            ['nombre' => 'Ingeniería en Logística y Aduanas', 'id_facultad' => 13],
            ['nombre' => 'Técnico en Ingeniería Industrial', 'id_facultad' => 5],
            ['nombre' => 'Técnico en Ingeniería de Manufactura Inteligente', 'id_facultad' => 1],
            ['nombre' => 'Técnico en Ingeniería en Informática Inteligente', 'id_facultad' => 1],
            ['nombre' => 'Técnico en Ingeniería Mecatrónica', 'id_facultad' => 1],
            ['nombre' => 'Técnico en Ingeniería Mecánica, Opción CNC', 'id_facultad' => 1],
            ['nombre' => 'Técnico en Ingeniería Mecánica, Opción Mantenimiento Industrial', 'id_facultad' => 1],
            ['nombre' => 'Técnico en Química Industrial', 'id_facultad' => 1],
            ['nombre' => 'Técnico en Ingeniería Electrónica Industrial', 'id_facultad' => 1],
            ['nombre' => 'Técnico en Mecánica Automotriz', 'id_facultad' => 6],
            ['nombre' => 'Técnico en Laboratorio Químico', 'id_facultad' => 8],
            ['nombre' => 'Técnico en Administración de Empresas Gastronómicas', 'id_facultad' => 7],
            ['nombre' => 'Técnico en Gastronomía', 'id_facultad' => 7],
        ]);
    }
}
