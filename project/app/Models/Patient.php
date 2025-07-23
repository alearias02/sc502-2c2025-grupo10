<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    // Campos que se podrán rellenar masivamente
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    /**
     * Relación 1:N con Appointment.
     */
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
