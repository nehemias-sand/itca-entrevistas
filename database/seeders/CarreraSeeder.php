<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    public function run()
    {
        // Insertando
        DB::table('carreras')->insert([
            'Técnico en Ingeniería Civil',
            'Técnico en Arquitectura',
            'Técnico en Ingeniería Eléctrica',
            'Técnico en Hardware Computacional',
            'Técnico en Energías Renovables',
            'Técnico en Ingeniería Electrónica Industrial',
            'Técnico en Ingeniería Mecánica (CNC y Mantenimiento Industrial)',
            'Técnico en Ingeniería Mecatrónica',
            'Técnico en Química Industrial',
            'Técnico en Ingeniería Industrial',
            'Técnico en Mecánica Automotriz',
            'Técnico en Laboratorio Químico',
            'Técnico en Administración de Empresas Gastronómicas',
            'Técnico en Gastronomía',
            'Técnico en Ingeniería de Desarrollo de Software',
            'Técnico en Ingeniería de Infraestructura de Redes Informáticas',
            'Técnico en Ingeniería de Desarrollo de Software',
            'Técnico en Gestión Tecnológica del Patrimonio Cultural',
            'Técnico Superior en Electrónica',
            'Técnico Superior en Logística Global',
            'Técnico en Hostelería y Turismo',
            'Técnico en Administración y Operación Portuaria',
            'Técnico en Manejo Integrado de Recursos Costero Marinos con Especialidad en Acuicultura y Pesquería',
            'Ingeniería en Mecatrónica',
            'Ingeniería Electrónica',
            'Ingeniería en Desarrollo de Software',
            'Ingeniería en Logística y Aduanas',
        ]);
    }
}
