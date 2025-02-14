<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 1',
            'descripcion' => 'Descripcion 1', 
            'precio' => 100,
            'categoria_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 2',
            'descripcion' => 'Descripcion 2',
            'precio' => 200,
            'categoria_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 3',
            'descripcion' => 'Descripcion 3',
            'precio' => 300,
            'categoria_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 4',
            'descripcion' => 'Descripcion 4',
            'precio' => 400,
            'categoria_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 5',
            'descripcion' => 'Descripcion 5',
            'precio' => 500,
            'categoria_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 6',
            'descripcion' => 'Descripcion 6',
            'precio' => 600,
            'categoria_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 7',
            'descripcion' => 'Descripcion 7',
            'precio' => 700,
            'categoria_id' => 4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 8',
            'descripcion' => 'Descripcion 8',
            'precio' => 800,
            'categoria_id' => 4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 9',
            'descripcion' => 'Descripcion 9',
            'precio' => 900,
            'categoria_id' => 5,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('articulos')->insert([
            'nombre' => 'Articulo 10',
            'descripcion' => 'Descripcion 10',
            'precio' => 1000,
            'categoria_id' => 5,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
