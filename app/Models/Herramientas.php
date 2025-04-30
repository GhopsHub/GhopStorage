<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Herramientas extends Model
{
    use HasFactory;

    protected $table = 'herramientas';

    protected $fillable = [
        'nombre',
        'tipo',
        'marca',
        'estado',
        'unidades',
        'observaciones',
    ];
}
