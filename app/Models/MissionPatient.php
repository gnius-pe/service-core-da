<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionPatient extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id',
        'patient_id',
        'some_extra_field', // Si tienes campos adicionales
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
