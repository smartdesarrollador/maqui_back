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
            'nombre_carousel' => "imagen1.jpg",
            'url_carousel' => "assets/imagen/carousel/imagen1.jpg",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,

        ]);

        DB::table('carousel')->insert([
            'id_carousel' => 2,
            'nombre_carousel' => "imagen2.jpg",
        'url_carousel' => "assets/imagen/carousel/imagen2.jpg",
        'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    
    DB::table('carousel')->insert([
            'id_carousel' => 3,
            'nombre_carousel' => "imagen3.jpg",
            'url_carousel' => "assets/imagen/carousel/imagen3.jpg",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,

        ]);

        DB::table('carousel')->insert([
            'id_carousel' => 4,
            'nombre_carousel' => "imagen4.jpg",
            'url_carousel' => "assets/imagen/carousel/imagen4.jpg",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('carousel')->insert([
            'id_carousel' => 5,
            'nombre_carousel' => "imagen5.jpg",
            'url_carousel' => "assets/imagen/carousel/imagen5.jpg",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

       
    }
}
