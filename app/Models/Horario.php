<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
