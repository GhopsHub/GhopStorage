<?php

namespace Database\Factories;

use App\Models\Proyectos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyectos>
 */
class ProyectosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Proyectos::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            'ubicacion' => $this->faker->address(),
            'fecha_inicio' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['activo', 'finalizado', 'pendiente', 'cancelado']),
            'responsable' => $this->faker->name(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
