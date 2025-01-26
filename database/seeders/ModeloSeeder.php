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
            'nombre' => 'CBR 1000RR',
            'marca_id' => 1,
            'tipo' => 'Deportiva', 
            'cilindrada' => 1000,
            'imagen' => 'https://example.com/cbr1000rr.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'YZF-R1',
            'marca_id' => 2,
            'tipo' => 'Deportiva',
            'cilindrada' => 998,
            'imagen' => 'https://example.com/yzf-r1.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'Ninja ZX-10R',
            'marca_id' => 3,
            'tipo' => 'Deportiva',
            'cilindrada' => 998,
            'imagen' => 'https://example.com/ninja-zx10r.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'GSX-R1000',
            'marca_id' => 4,
            'tipo' => 'Deportiva',
            'cilindrada' => 999,
            'imagen' => 'https://example.com/gsxr1000.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'S1000RR',
            'marca_id' => 5,
            'tipo' => 'Deportiva',
            'cilindrada' => 999,
            'imagen' => 'https://example.com/s1000rr.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'Panigale V4',
            'marca_id' => 6,
            'tipo' => 'Deportiva',
            'cilindrada' => 1103,
            'imagen' => 'https://example.com/panigale-v4.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'Africa Twin',
            'marca_id' => 1,
            'tipo' => 'Adventure',
            'cilindrada' => 1100,
            'imagen' => 'https://example.com/africa-twin.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'MT-09',
            'marca_id' => 2,
            'tipo' => 'Naked',
            'cilindrada' => 890,
            'imagen' => 'https://example.com/mt-09.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'Z900',
            'marca_id' => 3,
            'tipo' => 'Naked',
            'cilindrada' => 948,
            'imagen' => 'https://example.com/z900.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('modelos')->insert([
            'nombre' => 'R1250GS',
            'marca_id' => 5,
            'tipo' => 'Adventure',
            'cilindrada' => 1254,
            'imagen' => 'https://example.com/r1250gs.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
