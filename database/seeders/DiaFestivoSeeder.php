<?php

namespace Database\Seeders;

use App\Models\DiaFestivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaFestivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiaFestivo::create([
            'fecha' => 0101
        ]);

        DiaFestivo::create([
            'fecha' => 1609
        ]);

        DiaFestivo::create([
            'fecha' => 0211
        ]);

        DiaFestivo::create([
            'fecha' => 2019
        ]);

        DiaFestivo::create([
            'fecha' => 2512
        ]);
    }
}
