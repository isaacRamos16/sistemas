<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'apellido' => $this->faker->word,
            'correo' => $this->faker->word,
            'id_cargo' => 1,   // ✅ número entero
            'id_status' => 1,  // ✅ número entero
        ];
    }
}
