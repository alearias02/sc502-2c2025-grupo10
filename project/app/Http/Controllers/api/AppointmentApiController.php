<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\DoctorAvailability;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class AppointmentApiController extends Controller
{
    // Listar todas las citas
    public function index()
    {
        return Appointment::with(['doctor','patient'])->get();
    }

    // Crear nueva cita
    public function store(Request $request)
    {
        // 1. Validar datos básicos
        $data = $request->validate([
            'doctor_id'        => 'required|exists:doctors,id',
            'patient_id'       => 'required|exists:patients,id',
            'scheduled_at'     => 'required|date|after:now',
            'duration_minutes' => 'required|integer|min:5',
            'notes'            => 'nullable|string',
        ]);

        // 2. Parsear fecha y hora
        $slot      = Carbon::parse($data['scheduled_at']);
        $dayOfWeek = $slot->dayOfWeek;
        $time      = $slot->format('H:i:s');

        // 3. Verificar disponibilidad del doctor
        $ok = DoctorAvailability::where('doctor_id', $data['doctor_id'])
            ->where('day_of_week', $dayOfWeek)
            ->where('start_time', '<=', $time)
            ->where('end_time',   '>=', $time)
            ->exists();

        if (! $ok) {
            throw ValidationException::withMessages([
                'scheduled_at' => ['El doctor no atiende en ese horario.']
            ]);
        }

        // 4. Verificar que no exista cita en ese mismo instante
        $conflict = Appointment::where('doctor_id', $data['doctor_id'])
            ->where('scheduled_at', $slot->toDateTimeString())
            ->exists();

        if ($conflict) {
            throw ValidationException::withMessages([
                'scheduled_at' => ['Ya existe una cita en ese horario.']
            ]);
        }

        // 5. Crear la cita
        $appointment = Appointment::create($data);

        return response()->json($appointment->load(['doctor','patient']), 201);
    }

    // Mostrar una sola cita
    public function show(Appointment $appointment)
    {
        return $appointment->load(['doctor','patient']);
    }

    // Actualizar cita
    public function update(Request $request, Appointment $appointment)
    {
        // Validación similar a store, except email unique,etc.
        $data = $request->validate([
            'doctor_id'        => 'required|exists:doctors,id',
            'patient_id'       => 'required|exists:patients,id',
            'scheduled_at'     => 'required|date|after:now',
            'duration_minutes' => 'required|integer|min:5',
            'status'           => 'required|in:pending,confirmed,cancelled',
            'notes'            => 'nullable|string',
        ]);

        $slot      = Carbon::parse($data['scheduled_at']);
        $dayOfWeek = $slot->dayOfWeek;
        $time      = $slot->format('H:i:s');

        // Repetir validaciones de disponibilidad y choque,
        // excluyendo la propia cita al verificar conflicto:
        $ok = DoctorAvailability::where('doctor_id', $data['doctor_id'])
            ->where('day_of_week', $dayOfWeek)
            ->where('start_time', '<=', $time)
            ->where('end_time',   '>=', $time)
            ->exists();

        if (! $ok) {
            throw ValidationException::withMessages([
                'scheduled_at' => ['El doctor no atiende en ese horario.']
            ]);
        }

        $conflict = Appointment::where('doctor_id', $data['doctor_id'])
            ->where('scheduled_at', $slot->toDateTimeString())
            ->where('id', '!=', $appointment->id)
            ->exists();

        if ($conflict) {
            throw ValidationException::withMessages([
                'scheduled_at' => ['Ya existe una cita en ese horario.']
            ]);
        }

        $appointment->update($data);

        return response()->json($appointment->load(['doctor','patient']));
    }

    // Eliminar cita
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(null, 204);
    }
}
