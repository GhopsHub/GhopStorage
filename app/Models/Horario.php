<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'name',
        'hora_inicio',
        'hora_fin',
        'estado'
    ];
}
