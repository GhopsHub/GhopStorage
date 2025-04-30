<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maquinaria extends Model
{
    use HasFactory;

    protected $table = 'Maquinaria';

    protected $fillable = [
        'tipo',
        'nombre',
        'marca',
        'modelo',
        'numero_serie',
        'estado',
        'unidades',
        'ubicacion_actual',
        'observaciones',
    ];
}
