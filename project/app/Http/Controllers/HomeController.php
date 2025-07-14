<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $especialistas = [
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

        return view('index', compact('especialistas'));
    }
}
