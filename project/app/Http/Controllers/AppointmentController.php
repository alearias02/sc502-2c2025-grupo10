<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Mostrar el listado de citas en el panel de administración.
     */
    public function index()
    {
        // Carga citas con doctor y paciente
        $appointments = Appointment::with(['doctor','patient'])->get();

        // Para el modal de crear/editar
        $doctors  = Doctor::all();
        $patients = Patient::all();

        return view('admin.appointments.index', compact('appointments','doctors','patients'));
    }
}
