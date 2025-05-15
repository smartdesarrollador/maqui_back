<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('carousel')->insert([
            'id_carousel' => 1,
            'nombre_carousel' => "IBIZA-AZUL-LATERAL-860203179_1747249098.png",
            'url_carousel' => "assets/imagen/carousel/IBIZA-AZUL-LATERAL-860203179_1747249098.png",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,

        ]);

        DB::table('carousel')->insert([
            'id_carousel' => 2,
            'nombre_carousel' => "cheyenne-costado-rojo-1001497795_1747249165.png",
        'url_carousel' => "assets/imagen/carousel/cheyenne-costado-rojo-1001497795_1747249165.png",
        'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    
    DB::table('carousel')->insert([
            'id_carousel' => 3,
            'nombre_carousel' => "MURANO-ROJO-2025397578_1747249183.png",
            'url_carousel' => "assets/imagen/carousel/MURANO-ROJO-2025397578_1747249183.png",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,

        ]);

        DB::table('carousel')->insert([
            'id_carousel' => 4,
            'nombre_carousel' => "SHOGUN_AZUL_COSTADO_DERECHA-315317467_1747249201.png",
            'url_carousel' => "assets/imagen/carousel/SHOGUN_AZUL_COSTADO_DERECHA-315317467_1747249201.png",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('carousel')->insert([
            'id_carousel' => 5,
            'nombre_carousel' => "IBIZA-ROJA-3-5758239_1747249215.png",
            'url_carousel' => "assets/imagen/carousel/IBIZA-ROJA-3-5758239_1747249215.png",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

       
    }
}
