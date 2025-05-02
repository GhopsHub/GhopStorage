<?php

namespace Database\Factories;

use App\Models\Herramienta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Herramienta>
 */
class HerramientaFactory extends Factory
{
	protected $model = Herramienta::class;

	public function definition(): array
	{
		return [
			'nombre' => $this->faker->unique()->word(),
			'tipo' => $this->faker->word(),
			'marca' => $this->faker->word(),
			'unidades' => $this->faker->numberBetween(0, 100),
			'observaciones' => $this->faker->sentence(),
			'created_at' => $this->faker->dateTime(),
			'updated_at' => $this->faker->dateTime(),
			'deleted_at' => null,
		];
	}
}
