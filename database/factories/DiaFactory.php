<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dia>
 */
class DiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            /* 'dia' => $this->faker->date('d'),
            'id_periodo' => Periodo::all()->random()->id,
            'id_catalogo_de_horario' => Periodo::all()->random()->id */
        ];
    }
}
