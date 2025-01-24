<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TiposMediosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('tipos_medios')->insert([
            'id_tipos_medios' => 1,
            'nombre' => "banners",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipos_medios')->insert([
            'id_tipos_medios' => 2,
            'nombre' => "services",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
