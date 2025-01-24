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
            'nombre_carousel' => "slider_1.jpg",
            'url_carousel' => "assets/imagen/carousel/slider_1.jpg",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,

        ]);

        DB::table('carousel')->insert([
            'id_carousel' => 2,
            'nombre_carousel' => "slider_2.jpg",
        'url_carousel' => "assets/imagen/carousel/slider_2.jpg",
        'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    
    DB::table('carousel')->insert([
            'id_carousel' => 3,
            'nombre_carousel' => "slider_3.jpg",
            'url_carousel' => "assets/imagen/carousel/slider_3.jpg",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,

        ]);

       
    }
}
