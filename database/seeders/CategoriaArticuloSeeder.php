<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriaArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('categoria_articulos')->insert([
            'nombre' => 'Categoria 1',
            'descripcion' => 'Descripcion 1',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('categoria_articulos')->insert([
            'nombre' => 'Categoria 2', 
            'descripcion' => 'Descripcion 2',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('categoria_articulos')->insert([
            'nombre' => 'Categoria 3',
            'descripcion' => 'Descripcion 3', 
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('categoria_articulos')->insert([
            'nombre' => 'Categoria 4',
            'descripcion' => 'Descripcion 4',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('categoria_articulos')->insert([
            'nombre' => 'Categoria 5',
            'descripcion' => 'Descripcion 5',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
