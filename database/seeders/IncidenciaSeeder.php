<?php

namespace Database\Seeders;

use App\Models\Incidencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incidencia::create([
            'tipo' => 'F',
            'resultante' => 'falta',
            'penalizacion' => true,
            'porcentaje_penalizacion' => 0.5
        ]);
        
        Incidencia::create([
            'tipo' => 'P/S',
            'resultante' => 'Licencia s/g de sueldo',
            'penalizacion' => false 
        ]);

        Incidencia::create([
            'tipo' => 'Dia',
            'resultante' => 'Atraso',
            'penalizacion' => false,
        ]);

        Incidencia::create([
            'tipo' => '6Hrs',
            'resultante' => 'Atraso',
            'penalizacion' => false,
        ]);

        Incidencia::create([
            'tipo' => 'Comision',
            'resultante' => 'Atraso',
            'penalizacion' => false,
            'porcentaje_penalizacion' => 'Atraso'
        ]);

        Incidencia::create([
            'tipo' => 'Vacaciones',
            'resultante' => 'Atraso',
            'penalizacion' => false,
            'porcentaje_penalizacion' => 'Atraso'
        ]);
    }
}
