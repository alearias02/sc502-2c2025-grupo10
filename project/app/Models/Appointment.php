<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    // Campos rellenables masivamente
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'scheduled_at',
        'duration_minutes',
        'status',
        'notes',
    ];

    /**
     * Una cita pertenece a un doctor.
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Una cita pertenece a un paciente.
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
