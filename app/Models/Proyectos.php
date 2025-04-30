<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyectos extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'fecha_inicio',
        'estado',
        'responsable',
    ];
}
