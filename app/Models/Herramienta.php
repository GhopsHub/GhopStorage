<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Herramienta extends Model
{
    use HasFactory;

    protected $table = 'Herramientas';

    protected $fillable = [
        'nombre',
        'tipo',
        'marca',
        'estado',
        'unidades',
        'observaciones',
    ];
}
