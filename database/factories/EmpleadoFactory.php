<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'nombre' => $this->faker->name,
            'rfc' => Str::random(13),
            'curp' => Str::random(18),
            'tipo_trabajador' => $this->faker->randomElement(['medico', 'administrativo']),
            'horas_mensuales_disponibles' => 0,
            'catalogo_de_clues_id' => $this->faker->numberBetween(1, 10),
            
        ];
    }
}
