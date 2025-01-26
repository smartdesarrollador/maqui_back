<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccesorioMotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('accesorio_moto')->insert([
            'moto_id' => 1,
            'accesorio_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorio_moto')->insert([
            'moto_id' => 1,
            'accesorio_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorio_moto')->insert([
            'moto_id' => 2,
            'accesorio_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorio_moto')->insert([
            'moto_id' => 2,
            'accesorio_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorio_moto')->insert([
            'moto_id' => 3,
            'accesorio_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorio_moto')->insert([
            'moto_id' => 3,
            'accesorio_id' => 4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorio_moto')->insert([
            'moto_id' => 4,
            'accesorio_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorio_moto')->insert([
            'moto_id' => 4,
            'accesorio_id' => 4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorio_moto')->insert([
            'moto_id' => 5,
            'accesorio_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorio_moto')->insert([
            'moto_id' => 5,
            'accesorio_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
