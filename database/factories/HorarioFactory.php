<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use DateTime;
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
        $hora = new DateTime();
        $hora->setTime(mt_rand(0, 23), mt_rand(0, 59));
        $hora->format('H:i');
        return [
            'hora_entrada' => $hora,
            'hora_salida' => $hora,
            'descripcion' => Str::random(13),
            'hora_inicio_checada_entrada' => $hora,
            'hora_fin_checada_entrada' => $hora,
            'hora_inicio_checada_salida' => $hora,
            'hora_fin_checada_salida' => $hora,
        ];
    }
}
