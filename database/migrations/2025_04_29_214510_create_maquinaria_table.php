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
        Schema::create('maquinaria', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('nombre');
            $table->string('marca');
            $table->string('modelo');
            $table->string('numero_serie')->unique();
            $table->string('estado')->default(true);
            $table->integer('unidades');
            $table->string('ubicacion_actual');
            $table->string('observaciones');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquinaria');
    }
};
