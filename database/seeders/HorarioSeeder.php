<?php

namespace Database\Seeders;
use App\Models\Horario;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::create([
            'hora_entrada' => '8:00',
            'hora_salida' => '15:30',
            'descripcion' => 'de 8 am a 3:30 pm',
            'hora_inicio_checada_entrada' => '7:30',
            'hora_fin_checada_entrada' => '8:40',
            'hora_inicio_checada_salida' => '15:00',
            'hora_fin_checada_salida' => '16:00',
        ]);
        Horario::create([
            'hora_entrada' => '9:00',
            'hora_salida' => '16:30',
            'descripcion' => 'de 9 am a 4:30 pm',
            'hora_inicio_checada_entrada' => '8:30',
            'hora_fin_checada_entrada' => '9:40',
            'hora_inicio_checada_salida' => '16:00',
            'hora_fin_checada_salida' => '17:00',
        ]);
        Horario::create([
            'hora_entrada' => '20:00',
            'hora_salida' => '8:00',
            'descripcion' => 'de 8 pm a 8 am',
            'hora_inicio_checada_entrada' => '19:30',
            'hora_fin_checada_entrada' => '20:40',
            'hora_inicio_checada_salida' => '7:30',
            'hora_fin_checada_salida' => '8:30',
        ]);
        Horario::create([
            'hora_entrada' => '20:00',
            'hora_salida' => '20:00',
            'descripcion' => 'de 8 pm a 8 pm',
            'hora_inicio_checada_entrada' => '19:30',
            'hora_fin_checada_entrada' => '20:40',
            'hora_inicio_checada_salida' => '19:30',
            'hora_fin_checada_salida' => '20:40',
        ]);
    }
}
/* hora_entrada, hora_salida, descripcion,
hora_inicio_checada_entrada, hora_fin_checada_entrada,
hora_inicio_checada_salida, hora_fin_checada_salida*/