<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('proyectos', function (Blueprint $table) {
			$table->id();
			$table->string('nombre');
			$table->string('descripcion');
			$table->string('ubicacion');
			$table->date('fecha_inicio');
			// $table->enum('estado', ['activo', 'finalizado', 'pendiente', 'cancelado'])->default('pendiente');
			$table->string('estado')->default('activo');
			$table->string('responsable');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('proyectos');
	}
};
