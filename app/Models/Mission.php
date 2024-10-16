<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'country',
        'start_date',
        'end_date',
        'creation_date',
    ];

    // Relaciones
    public function users()
    {
        return $this->belongsToMany(User::class, 'missions_users');
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'missions_patients');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function specialities()
    {
       return $this->belongsToMany(Specialty::class, 'missions_specialities');
     
    }
}
