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
            'penalizacion' => true,
            'porcentaje_penalizacion' => 0.5 
        ]);
        
        Incidencia::create([
            'tipo' => 'P/G',
            'resultante' => 'Licencia c/g de sueldo',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'R/1',
            'resultante' => 'Retardo Menor',
            'penalizacion' => false,
        ]);

        Incidencia::create([
            'tipo' => 'R/2',
            'resultante' => 'Retardo Mayor',
            'penalizacion' => true,
            'porcentaje_penalizacion' => 0.5
        ]);

        Incidencia::create([
            'tipo' => 'O',
            'resultante' => 'Onomastico',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'V',
            'resultante' => 'Vacaciones',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'E',
            'resultante' => 'Licencia Medica',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'L/S',
            'resultante' => 'Licencia Sindical',
            'penalizacion' => false,
        ]);

        Incidencia::create([
            'tipo' => 'C',
            'resultante' => 'Comision',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'P/E',
            'resultante' => 'Permiso Economico',
            'penalizacion' => true,
            'porcentaje_penalizacion' => 0.5
        ]);

        Incidencia::create([
            'tipo' => 'O',
            'resultante' => 'Omision',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'S',
            'resultante' => 'Suspension',
            'penalizacion' => true,
            'porcentaje_penalizacion' => 0.5
        ]);

        Incidencia::create([
            'tipo' => 'P/H',
            'resultante' => 'Permiso por Hora',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'P/A',
            'resultante' => 'Pago de Guardia',
            'penalizacion' => true,
            'porcentaje_penalizacion' => 0.5
        ]);

        Incidencia::create([
            'tipo' => 'M',
            'resultante' => 'Memorandum',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'R',
            'resultante' => 'Riesgo',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'COV',
            'resultante' => 'Covid',
            'penalizacion' => false
        ]);

        Incidencia::create([
            'tipo' => 'R/D',
            'resultante' => 'Reposicion',
            'penalizacion' => false
        ]);
    }
}
