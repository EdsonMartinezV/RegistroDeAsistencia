<?php

namespace Database\Seeders;

use App\Models\SubtipoDeIncidencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuptipoDeIncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubtipoDeIncidencia::create([
            'descripcion' => 'O/E',
            'catalogo_de_incidencias_id' => 12
        ]);

        SubtipoDeIncidencia::create([
            'descripcion' => 'O/S',
            'catalogo_de_incidencias_id' => 12
        ]);

        SubtipoDeIncidencia::create([
            'descripcion' => 'MR',
            'catalogo_de_incidencias_id' => 17
        ]);

        SubtipoDeIncidencia::create([
            'descripcion' => 'AR',
            'catalogo_de_incidencias_id' => 17
        ]);

        SubtipoDeIncidencia::create([
            'descripcion' => 'BR',
            'catalogo_de_incidencias_id' => 17
        ]);
    }
}
