<?php

namespace Database\Seeders;

use App\Models\usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // usuario::factory(10)->create();

        usuario::factory()->create([
            'name' => 'isaac',
            'apellido' => 'ramos',
            'email' => 'test@example.com',
            'id_cargo' =>1,
            'id_status' => 1,
        ]);

        usuario::factory(5)->create();
    }
}
