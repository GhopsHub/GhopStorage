<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Herramienta extends Model
{
	use HasFactory;

	protected $fillable = [
		'nombre',
		'tipo',
		'marca',
		'estado',
		'unidades',
		'observaciones',
	];

	protected static function booted()
	{
		static::saving(function ($herramienta) {
			$herramienta->unidades = (int) $herramienta->unidades;
			if ($herramienta->unidades === 0) {
				$herramienta->estado = 'sin_existencias';
			} elseif ($herramienta->unidades > 0) {
				if ($herramienta->estado !== 'no_disponible') {
					$herramienta->estado = 'disponible';
				}
			}
		});
	}
}
