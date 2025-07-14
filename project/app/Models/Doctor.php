<?php
// app/Models/Doctor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    // Asignación masiva
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'license_number',
        'bio',
        'photo_url',
    ];

    /**
     * Relación muchos a muchos con Specialties.
     */
    public function specialties(): BelongsToMany
    {
        return $this->belongsToMany(Specialty::class, 'doctor_specialty')
                    ->withTimestamps();
    }

    /**
     * Relación uno a muchos con DoctorAvailability.
     */
    public function availabilities(): HasMany
    {
        return $this->hasMany(DoctorAvailability::class);
    }
}
