<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empleado;
use App\Models\Incidencia;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Justificante>
 */
class JustificanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'empleado_id' => Empleado::all()->random()->id,
            'catalogo_de_incidencias_id' => Incidencia::all()->random()->id,
            'tipo' => $this->faker->name,
            'fecha_inicio' => $this->faker->dateTime($max = 'now'),
            'fecha_final' => $this->faker->dateTime($max = 'now'),
            'horario' => $this->faker->randomElement([
                'Matutino',
                'Vespertino',
            ]),
            'num_memorandum' => $this->faker->randomNumber(6),
        ];
    }
}
