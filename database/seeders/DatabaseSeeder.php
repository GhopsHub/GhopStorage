<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Proyectos;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Maquinaria;
use App\Models\Herramientas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Maquinaria::factory(50)->create();
        Herramientas::factory(100)->create();
        Proyectos::factory(10)->create();

        Seeder::call([
            AdminSeeder::class,
            HorariosSeeder::class,
        ]);
    }
}
