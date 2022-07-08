<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::create([
            'inicio_periodo_laboral' => new Carbon('2022-05-06 00:00:00'),
            'fin_periodo_laboral' => new Carbon('2022-06-06 00:00:00'),
            'empleado_id' => 1,
        ]);
        Periodo::create([
            'inicio_periodo_laboral' => new Carbon('2022-06-07 00:00:00'),
            'fin_periodo_laboral' => new Carbon('2022-07-07 00:00:00'),
            'empleado_id' => 1,
        ]);
    }
}
