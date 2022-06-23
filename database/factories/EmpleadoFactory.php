<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'rfc' => $this->faker->unique()->rfc,
            'curp' => $this->faker->unique()->curp,
            'tipo_trabajador' => $this->faker->randomElement(['medico', 'administrativo']),
            'clues_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
