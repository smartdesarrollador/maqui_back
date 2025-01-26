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
            'nombre' => 'Deportiva',
            'descripcion' => 'Moto deportiva de alto rendimiento',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Scooter',
            'descripcion' => 'Moto automática ideal para ciudad',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Aventura',
            'descripcion' => 'Moto todoterreno para caminos difíciles',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Urbana',
            'descripcion' => 'Moto económica para uso diario',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_motos')->insert([
            'nombre' => 'Custom',
            'descripcion' => 'Moto estilo crucero para viajes largos',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
