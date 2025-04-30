<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Proyecto;
use App\Models\Maquinaria;
use App\Models\Herramienta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Maquinaria::factory(50)->create();
        Herramienta::factory(100)->create();
        Proyecto::factory(10)->create();

        Seeder::call([
            AdminSeeder::class,
            HorarioSeeder::class,
        ]);
    }
}
