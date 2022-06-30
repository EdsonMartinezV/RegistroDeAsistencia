<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registro>
 */
class RegistroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hora' => $this->faker->dateTime($max = 'now', $min = '-1 years'),
            'empleado_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
