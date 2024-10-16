<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quota extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser llenados masivamente
    protected $fillable = ['day', 'quota', 'specialty_id'];

    // Un cupo pertenece a una especialidad
    public function specialty(): BelongsTo
    {
        return $this->belongsTo(Specialty::class);
    }
}
