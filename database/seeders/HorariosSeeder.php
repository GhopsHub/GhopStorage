<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $nombres = ['Mañana', 'Tarde', 'Noche'];

        foreach ($nombres as $nombre) {
            Horario::create([
                'name' => $nombre,
                'hora_inicio' => $faker->time('H:i'),
                'hora_fin' => $faker->time('H:i'),
                'estado' => $faker->boolean(),
            ]);
        }
    }
}
