<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Periodo;
use App\Models\Horario;

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
            'dia_entrada' => $this->faker->randomNumber($min = 1, $max = 7),
            'dia_salida' => $this->faker->randomNumber($min = 1, $max = 7),
            'id_periodo' => Periodo::all()->random()->id,
            'id_catalogo_de_horario' => Horario::all()->random()->id
        ];
    }
}
