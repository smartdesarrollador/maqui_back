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
            'color' => 'negro_rojo',
            'imagen_color' => 'assets/imagen/motos/MM_ALASKA_250.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 2,
            'color' => 'azul',
            'imagen_color' => 'assets/imagen/motos/MM_BERLIN_AZUL_1.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para BERLÍN 150 (modelo_id: 2)
        DB::table('moto_colores')->insert([
            'modelo_id' => 2,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/BERLIN-NEGRO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 2,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/BERLIN-ROJO-lado.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para CALI 125 (modelo_id: 3)
        DB::table('moto_colores')->insert([
            'modelo_id' => 2,
            'color' => 'azul',
            'imagen_color' => 'assets/imagen/motos/BERLIN-COSTADO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 3,
            'color' => 'blanco',
            'imagen_color' => 'assets/imagen/motos/CALI-BLANCA-COSTADO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para CHEYENNE 150 (modelo_id: 4)
        DB::table('moto_colores')->insert([
            'modelo_id' => 3,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/CALI-NEGRA-COSTADO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 3,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/CALI-ROJA-costado.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para CHEYENNE 200 (modelo_id: 5)
        DB::table('moto_colores')->insert([
            'modelo_id' => 3,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/MM_CALI_ROSADO_2.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 4,
            'color' => 'celeste',
            'imagen_color' => 'assets/imagen/motos/cheyenne-costado-celeste.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        // Colores para DAKOTA 150 (modelo_id: 6)
        DB::table('moto_colores')->insert([
            'modelo_id' => 4,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/cheyenne-costado-rojo.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 5,
            'color' => 'celeste',
            'imagen_color' => 'assets/imagen/motos/CELESTE_DIAGONAL_DERECHO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 5,
            'color' => 'naranja',
            'imagen_color' => 'assets/imagen/motos/NARANJA_DIAGONAL_DERECHO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 6,
            'color' => 'naranja',
            'imagen_color' => 'assets/imagen/motos/DAKOTA-NARANJA-COSTADP.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 6,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/DAKOTA-ROJOCOSTADP.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 7,
            'color' => 'azul',
            'imagen_color' => 'assets/imagen/motos/MM_DETROIT-DD_AZUL_2.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 7,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/MM_DETROIT-DD_NEGRO_2.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 8,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/hummer-de-costado.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 8,
            'color' => 'verde',
            'imagen_color' => 'assets/imagen/motos/LATERAL.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 9,
            'color' => 'verde',
            'imagen_color' => 'assets/imagen/motos/IBIZA-AZUL-LATERAL.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 9,
            'color' => 'gris',
            'imagen_color' => 'assets/imagen/motos/IBIZA-GRIS-LATERAL.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 9,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/IBIZA-NEGRA-COSTADO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 9,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/IBIZA-ROJA-COSTADO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 10,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/IBIZA-ROJA-2.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 10,
            'color' => 'verde',
            'imagen_color' => 'assets/imagen/motos/IBIZA-VERDE-2.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 11,
            'color' => 'azul',
            'imagen_color' => 'assets/imagen/motos/IBIZA-AZUL-3.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 11,
            'color' => 'gris',
            'imagen_color' => 'assets/imagen/motos/IBIZA-GRIS-3.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 11,
            'color' => 'naranja',
            'imagen_color' => 'assets/imagen/motos/IBIZA-NARANJA-3.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 11,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/IBIZA-ROJA-3.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 12,
            'color' => 'blanco',
            'imagen_color' => 'assets/imagen/motos/MANHATTAN-NARANJA.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 12,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/MANHATTAN-COSTADO-NARANJA-NEGRO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 12,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/MANHATTAN-COSTADO-ROJO-NEGRO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 13,
            'color' => 'gris',
            'imagen_color' => 'assets/imagen/motos/MURANO-LATERAL-1.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 13,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/MURANO-ROJO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 14,
            'color' => 'verde',
            'imagen_color' => 'assets/imagen/motos/NAIROBI-GRIS.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 14,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/NAIROBI-ROJO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 15,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/RIO-NEGRO_COSTADO_DERECHA.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 16,
            'color' => 'blanco',
            'imagen_color' => 'assets/imagen/motos/seul-blanco.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 16,
            'color' => 'gris',
            'imagen_color' => 'assets/imagen/motos/SEUL-GRIS.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 16,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/seul-negra-costado.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 16,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/seul-roja.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 16,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/SEUL-ROSADA-LADO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 16,
            'color' => 'azul',
            'imagen_color' => 'assets/imagen/motos/seul-tornasolado.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 17,
            'color' => 'azul',
            'imagen_color' => 'assets/imagen/motos/SHOGUN_AZUL_COSTADO_DERECHA.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 17,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/SHOGUN_NEGRO_COSTADO_DERECHA.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 17,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/SHOGUN_ROJO_COSTADO-DERECHA.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 19,
            'color' => 'blanco',
            'imagen_color' => 'assets/imagen/motos/TEKKEN-BLANCO-COSTADO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 19,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/NEGRO COSTADO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 20,
            'color' => 'blanco',
            'imagen_color' => 'assets/imagen/motos/TEKKEN_BLANCO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 20,
            'color' => 'gris',
            'imagen_color' => 'assets/imagen/motos/TEKKEN-PRO-250.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 21,
            'color' => 'rojo',
            'imagen_color' => 'assets/imagen/motos/XT-150-VIP-LADO-negro.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('moto_colores')->insert([
            'modelo_id' => 22,
            'color' => 'negro',
            'imagen_color' => 'assets/imagen/motos/200XT-VIP-lado-NEGRO.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        
    }
}
