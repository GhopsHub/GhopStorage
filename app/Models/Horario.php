<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'Horarios';

    protected $fillable = [
        'name',
        'hora_inicio',
        'hora_fin',
        'estado'
    ];

    protected $casts = [
        'hora_inicio' => 'datetime:H:i',
        'hora_fin' => 'datetime:H:i',
    ];

    protected function horaInicio(): Attribute
    {
        return Attribute::make(
            set: fn($value) => date('H:i', strtotime($value)),
        );
    }

    protected function horaFin(): Attribute
    {
        return Attribute::make(
            set: fn($value) => date('H:i', strtotime($value)),
        );
    }
}
