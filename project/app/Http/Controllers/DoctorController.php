<?php
// app/Http/Controllers/DoctorController.php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;

class DoctorController extends Controller
{
    public function index()
    {
        // Solo devuelve la vista con datos para Blade
        $doctors     = Doctor::with('specialties')->get();
        $specialties = Specialty::all();
        return view('admin.doctors.index', compact('doctors','specialties'));
    }
}
