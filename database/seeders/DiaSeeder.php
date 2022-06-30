<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Diax;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 1,
            'dia_salida' => 1,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 2,
            'dia_salida' => 2,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 3,
            'dia_salida' => 3,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 4,
            'dia_salida' => 4,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 5,
            'dia_salida' => 5,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 6,
            'dia_salida' => 6,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 7,
            'dia_salida' => 7,
        ]);

        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 1,
            'dia_salida' => 2,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 3,
            'dia_salida' => 4,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 5,
            'dia_salida' => 6,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 1,
            'dia_salida' => 3,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => '15:30',
            'dia_entrada' => 5,
            'dia_salida' => 7,
        ]);
        
        
    }
}
