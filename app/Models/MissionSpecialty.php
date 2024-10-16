<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionSpecialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_id',
        'specialty_id',
    ];
}
