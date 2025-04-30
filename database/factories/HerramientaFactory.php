<?php

namespace Database\Factories;

use App\Models\Herramienta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Herramientas>
 */
class HerramientaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Herramienta::class;

    public function definition(): array
    {
        $unidades = $this->faker->numberBetween(0, 100);

        return [
            'nombre' => $this->faker->word(),
            'tipo' => $this->faker->word(),
            'marca' => $this->faker->word(),
            'estado' => $unidades === 0 ? 'sin existencias' : $this->faker->randomElement(['disponible', 'ocupado']),
            'unidades' => $unidades,
            'observaciones' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
