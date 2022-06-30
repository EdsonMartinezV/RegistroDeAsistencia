<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dia;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //primer catalogo
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 1,
            'dia_entrada' => 1,
            'dia_salida' => 1,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 1,
            'dia_entrada' => 2,
            'dia_salida' => 2,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 1,
            'dia_entrada' => 3,
            'dia_salida' => 3,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 1,
            'dia_entrada' => 4,
            'dia_salida' => 4,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 1,
            'dia_entrada' => 5,
            'dia_salida' => 5,
        ]);
        //segundo catalogo
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 2,
            'dia_entrada' => 1,
            'dia_salida' => 1,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 2,
            'dia_entrada' => 2,
            'dia_salida' => 2,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 2,
            'dia_entrada' => 3,
            'dia_salida' => 3,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 2,
            'dia_entrada' => 4,
            'dia_salida' => 4,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 2,
            'dia_entrada' => 5,
            'dia_salida' => 5,
        ]);
        /*Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 2,
            'dia_entrada' => 6,
            'dia_salida' => 6,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 2,
            'dia_entrada' => 7,
            'dia_salida' => 7,
        ]);*/
        //Tercer catalogo
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 3,
            'dia_entrada' => 1,
            'dia_salida' => 2,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 3,
            'dia_entrada' => 3,
            'dia_salida' => 4,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 3,
            'dia_entrada' => 5,
            'dia_salida' => 6,
        ]);
        //-------------//
        //Cuarto catalogo
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 4,
            'dia_entrada' => 1,
            'dia_salida' => 3,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 4,
            'dia_entrada' => 5,
            'dia_salida' => 7,
        ]);
        //-----------//
        //Quinto catalogo
        /*
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 5,
            'dia_entrada' => 1,
            'dia_salida' => 1,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 5,
            'dia_entrada' => 2,
            'dia_salida' => 2,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 5,
            'dia_entrada' => 3,
            'dia_salida' => 3,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 5,
            'dia_entrada' => 4,
            'dia_salida' => 4,
        ]);
        Dia::create([
            'periodo_id' => 1,
            'catalogo_de_horarios_id' => 5,
            'dia_entrada' => 5,
            'dia_salida' => 5,
        ]);*/
        
    }
}
