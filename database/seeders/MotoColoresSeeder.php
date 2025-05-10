<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MotoColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        // Colores para ALASKA 250 (modelo_id: 1)
        DB::table('moto_colores')->insert([
            'modelo_id' => 1,
            'color' => 'Negro',
            'imagen_color' => 'https://example.com/alaska250/negro.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 1,
            'color' => 'Rojo',
            'imagen_color' => 'https://example.com/alaska250/rojo.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para BERLÍN 150 (modelo_id: 2)
        DB::table('moto_colores')->insert([
            'modelo_id' => 2,
            'color' => 'Azul',
            'imagen_color' => 'https://example.com/berlin150/azul.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 2,
            'color' => 'Blanco',
            'imagen_color' => 'https://example.com/berlin150/blanco.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para CALI 125 (modelo_id: 3)
        DB::table('moto_colores')->insert([
            'modelo_id' => 3,
            'color' => 'Verde',
            'imagen_color' => 'https://example.com/cali125/verde.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 3,
            'color' => 'Negro Mate',
            'imagen_color' => 'https://example.com/cali125/negro_mate.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para CHEYENNE 150 (modelo_id: 4)
        DB::table('moto_colores')->insert([
            'modelo_id' => 4,
            'color' => 'Gris',
            'imagen_color' => 'https://example.com/cheyenne150/gris.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 4,
            'color' => 'Naranja',
            'imagen_color' => 'https://example.com/cheyenne150/naranja.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para CHEYENNE 200 (modelo_id: 5)
        DB::table('moto_colores')->insert([
            'modelo_id' => 5,
            'color' => 'Rojo',
            'imagen_color' => 'https://example.com/cheyenne200/rojo.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 5,
            'color' => 'Negro',
            'imagen_color' => 'https://example.com/cheyenne200/negro.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para DAKOTA 150 (modelo_id: 6)
        DB::table('moto_colores')->insert([
            'modelo_id' => 6,
            'color' => 'Azul Metálico',
            'imagen_color' => 'https://example.com/dakota150/azul_metalico.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 6,
            'color' => 'Blanco Perlado',
            'imagen_color' => 'https://example.com/dakota150/blanco_perlado.jpg',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
