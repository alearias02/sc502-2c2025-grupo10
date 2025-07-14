<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors     = Doctor::with('specialties')->get();
        $specialties = Specialty::all(); // para el modal de crear/editar
        return view('admin.doctors.index', compact('doctors','specialties'));
    }
}
