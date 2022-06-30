<?php

namespace Database\Seeders;

use App\Models\Clues;
use App\Models\Empleado;
use App\Models\Dia;
use App\Models\Horario;
use App\Models\Justificante;
use App\Models\Periodo;
use App\Models\Registro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Clues::factory(10)->create();
        Empleado::factory(10)->create();
        $this->call(HorarioSeeder::class);
        //Horario::factory(10)->create();
        Periodo::factory(10)->create();
        $this->call(DiaSeeder::class);
        //Dia::factory(10)->create(); 
        //Registro::factory(100)->create();
        Justificante::factory(10)->create(); 
        
         $this->call(DiaFestivoSeeder::class);
        $this->call(IncidenciaSeeder::class);
        $this->call(SubtipoDeIncidenciaSeeder::class); 
        $this->call(SuptipoDeIncidenciaSeeder::class);
       /*  $this->call(DiaSeeder::class);
        $this->call(HorarioSeeder::class); */
         /*App\Models\User::factory(10)->create();

         App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);*/
    }
}
