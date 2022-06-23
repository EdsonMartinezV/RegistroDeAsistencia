<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turno>
 */
class TurnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'entrada' => $this->faker->Time($max = 'now'),
            'salida' => $this->faker->Time($max = 'now'),
            'id_dia' => Dia::all()->random()->id
        ];
    }
}
