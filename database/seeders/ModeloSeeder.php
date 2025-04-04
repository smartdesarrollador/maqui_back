<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('modelos')->insert([
            'nombre' => 'ALASKA 250',
            'marca_id' => 1,
            'tipo_moto_id' => 3,
            'cilindrada' => 1000,
            'imagen' => 'https://example.com/cbr1000rr.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'BERLÍN 150',
            'marca_id' => 2,
            'tipo_moto_id' => 1,
            'cilindrada' => 998,
            'imagen' => 'https://example.com/yzf-r1.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'CALI 125',
            'marca_id' => 3,
            'tipo_moto_id' => 4,
            'cilindrada' => 998,
            'imagen' => 'https://example.com/ninja-zx10r.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'CHEYENNE 150',
            'marca_id' => 4,
            'tipo_moto_id' => 1,
            'cilindrada' => 999,
            'imagen' => 'https://example.com/gsxr1000.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'CHEYENNE 200',
            'marca_id' => 4,
            'tipo_moto_id' => 1,
            'cilindrada' => 999,
            'imagen' => 'https://example.com/s1000rr.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'DAKOTA 150',
            'marca_id' => 5,
            'tipo_moto_id' => 5,
            'cilindrada' => 1103,
            'imagen' => 'https://example.com/panigale-v4.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'DETROIT DD 150',
            'marca_id' => 6,
            'tipo_moto_id' => 4,
            'cilindrada' => 1100,
            'imagen' => 'https://example.com/africa-twin.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'HUMMER 150',
            'marca_id' => 7,
            'tipo_moto_id' => 4,
            'cilindrada' => 890,
            'imagen' => 'https://example.com/mt-09.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'IBIZA R250',
            'marca_id' => 8,
            'tipo_moto_id' => 2,
            'cilindrada' => 948,
            'imagen' => 'https://example.com/z900.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'IBIZA Z200',
            'marca_id' => 8,
            'tipo_moto_id' => 2,
            'cilindrada' => 1254,
            'imagen' => 'https://example.com/r1250gs.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'IBIZA Z250',
            'marca_id' => 8,
            'tipo_moto_id' => 2,
            'cilindrada' => 300,
            'imagen' => 'https://example.com/nevada300.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'MANHATTAN 250',
            'marca_id' => 9,
            'tipo_moto_id' => 1,
            'cilindrada' => 250,
            'imagen' => 'https://example.com/arizona250.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'MURANO 150',
            'marca_id' => 10,
            'tipo_moto_id' => 4,
            'cilindrada' => 400,
            'imagen' => 'https://example.com/texas400.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'NAIROBI 125',
            'marca_id' => 11,
            'tipo_moto_id' => 4,
            'cilindrada' => 500,
            'imagen' => 'https://example.com/california500.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'RÍO 125',
            'marca_id' => 12,
            'tipo_moto_id' => 1,
            'cilindrada' => 650,
            'imagen' => 'https://example.com/montana650.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'SEÚL 150',
            'marca_id' => 13,
            'tipo_moto_id' => 4,
            'cilindrada' => 750,
            'imagen' => 'https://example.com/colorado750.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'SHOGUN 200',
            'marca_id' => 14,
            'tipo_moto_id' => 1,
            'cilindrada' => 800,
            'imagen' => 'https://example.com/oregon800.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'FLORIDA 900',
            'marca_id' => 6,
            'tipo_moto_id' => 2,
            'cilindrada' => 900,
            'imagen' => 'https://example.com/florida900.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'TEKKEN 300',
            'marca_id' => 15,
            'tipo_moto_id' => 1,
            'cilindrada' => 1000,
            'imagen' => 'https://example.com/alaska1000.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'TEKKEN PRO 250',
            'marca_id' => 15,
            'tipo_moto_id' => 1,
            'cilindrada' => 1200,
            'imagen' => 'https://example.com/hawaii1200.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'XPARTA 150',
            'marca_id' => 16,
            'tipo_moto_id' => 3,
            'cilindrada' => 1500,
            'imagen' => 'https://example.com/washington1500.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'XPARTA 200',
            'marca_id' => 16,
            'tipo_moto_id' => 3,
            'cilindrada' => 1500,
            'imagen' => 'https://example.com/washington1500.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
