<?php
// app/Models/Specialty.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specialty extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relación muchos a muchos con Doctors.
     */
    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class, 'doctor_specialty')
                    ->withTimestamps();
    }
}
