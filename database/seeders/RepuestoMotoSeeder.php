<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RepuestoMotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('repuesto_moto')->insert([
            'moto_id' => 1,
            'repuesto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
