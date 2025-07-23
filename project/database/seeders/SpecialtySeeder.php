<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;

class SpecialtySeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Radiología e Imágenes Médicas',
            'Cirugía General y Proctología',
            'Cirujano Endoscopista',
            'Ginecología y Obstetricia',
            'Otorrinolaringología',
            'Medicina General',
            'Ortopedia y Traumatología',
            'Dermatología Clínica',
            'Psiquiatría y Salud Mental',
        ];

        foreach($names as $n) {
            Specialty::firstOrCreate(['name' => $n]);
        }
    }
}
