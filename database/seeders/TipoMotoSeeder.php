<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoMotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('tipo_motos')->insert([
            'nombre' => 'Pisteras',
            'descripcion' => 'Moto deportiva de alto rendimiento',
            'imagen' => 'pisteras.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Deportiva',
            'descripcion' => 'Moto automática ideal para ciudad',
            'imagen' => 'deportiva.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Todo Terreno',
            'descripcion' => 'Moto todoterreno para caminos difíciles',
            'imagen' => 'todo_terreno.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Scooter',
            'descripcion' => 'Moto económica para uso diario',
            'imagen' => 'scooter.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Utilitarias',
            'descripcion' => 'Moto estilo crucero para viajes largos',
            'imagen' => 'utilitarias.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Eléctrica',
            'descripcion' => 'Moto estilo crucero para viajes largos',
            'imagen' => 'electrica.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Doble Propósito',
            'descripcion' => 'Moto estilo doble propósito',
            'imagen' => 'doble_proposito.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
