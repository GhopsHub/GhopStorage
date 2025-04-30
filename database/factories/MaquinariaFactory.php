<?php

namespace Database\Factories;

use App\Models\Maquinaria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maquinaria>
 */
class MaquinariaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Maquinaria::class;

    public function definition(): array
    {
        return [
            'tipo' => $this->faker->word(),
            'nombre' => $this->faker->word(),
            'marca' => $this->faker->word(),
            'modelo' => $this->faker->word(),
            'numero_serie' => $this->faker->unique->randomNumber(),
            'estado' => $this->faker->randomElement(['disponible', 'ocupado', 'mantenimiento']),
            'unidades' => $this->faker->numberBetween(1, 30),
            'ubicacion_actual' => $this->faker->word(),
            'observaciones' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
