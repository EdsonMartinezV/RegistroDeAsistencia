<?php

namespace Database\Seeders;

use App\Models\Registro;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Registro::create([
            'hora' => new Carbon('2022-07-05 08:30:00'),
            'empleado_id' => 1,
        ]);
        Registro::create([
            'hora' => new Carbon('2022-07-06 08:50:00'),
            'empleado_id' => 1,
        ]);
        Registro::create([
            'hora' => new Carbon('2022-07-05 16:30:00'),
            'empleado_id' => 1,
        ]);
        Registro::create([
            'hora' => new Carbon('2022-07-06 17:01:00'),
            'empleado_id' => 1,
        ]);
        Registro::create([
            'hora' => new Carbon('2022-07-07 08:29:00'),
            'empleado_id' => 1,
        ]);
        Registro::create([
            'hora' => new Carbon('2022-07-08 09:00:00'),
            'empleado_id' => 1,
        ]);
        Registro::create([
            'hora' => new Carbon('2022-07-07 15:59:00'),
            'empleado_id' => 1,
        ]);
        Registro::create([
            'hora' => new Carbon('2022-07-08 16:20:00'),
            'empleado_id' => 1,
        ]);
    }
}
