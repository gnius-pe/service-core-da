<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialty extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser llenados masivamente (Mass Assignment)
    protected $fillable = ['name', 'description', 'status'];

    // Una especialidad tiene muchos cupos
    public function quotas(): HasMany
    {
        return $this->hasMany(Quota::class);
    }

    public function missions()
    {
        return $this->belongsToMany(Specialty::class , 'missions_specialities');
      
    }
}

