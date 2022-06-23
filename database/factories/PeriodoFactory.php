<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodo>
 */
class PeriodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'inicio_periodo_laboral' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'fin_periodo_laboral' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'empleado_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
