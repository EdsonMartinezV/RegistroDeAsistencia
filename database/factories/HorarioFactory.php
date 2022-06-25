<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horario>
 */
class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hora_entrada' => $this->faker->Time($max = 'now'),
            'hora_salida' => $this->faker->Time($max = 'now'),
            'descripcion' => Str::random(13),
            'hora_inicio_checada_entrada' => $this->faker->Time($max = 'now'),
            'hora_fin_checada_entrada' => $this->faker->Time($max = 'now'),
            'hora_inicio_checada_salida' => $this->faker->Time($max = 'now'),
            'hora_fin_checada_salida' => $this->faker->Time($max = 'now')
        ];
    }
}
