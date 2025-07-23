<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nombre'=>'Dra. Mayra Becerra Gómez',   'especialidad'=>'Radiología e Imágenes Médicas'],
            ['nombre'=>'Dr. Dimas Bravo Saturno',     'especialidad'=>'Cirugía General y Proctología'],
            ['nombre'=>'Dr. Alberto Zamora Arce',     'especialidad'=>'Cirujano Endoscopista'],
            ['nombre'=>'Dr. Henry Rodríguez Retana',  'especialidad'=>'Ginecología y Obstetricia'],
            ['nombre'=>'Dr. Daniel Zumbado Campos',   'especialidad'=>'Otorrinolaringología'],
            ['nombre'=>'Dr. Luis Aguilar Avendaño',   'especialidad'=>'Medicina General'],
            ['nombre'=>'Dr. Adolfo Hernández Arias',  'especialidad'=>'Ortopedia y Traumatología'],
            ['nombre'=>'Dra. Laura Castro Jiménez',   'especialidad'=>'Dermatología Clínica'],
            ['nombre'=>'Dr. Esteban Vega Morales',    'especialidad'=>'Psiquiatría y Salud Mental'],
        ];

        foreach($data as $item) {
            // separar nombre completo
            $parts = explode(' ', $item['nombre'], 3);
            $first = $parts[0] . ' ' . ($parts[1] ?? '');
            $last  = $parts[2] ?? '';
            // email dummy
            $email = Str::slug($item['nombre'], '_').'@example.com';

            $doc = Doctor::create([
                'first_name'     => $first,
                'last_name'      => $last,
                'email'          => $email,
                'license_number' => 'LIC-'.Str::upper(Str::random(6)),
                'phone'          => null,
                'bio'            => null,
            ]);

            // asociar especialidad
            $spec = Specialty::where('name', $item['especialidad'])->first();
            if($spec) {
                $doc->specialties()->attach($spec->id);
            }
        }
    }
}
