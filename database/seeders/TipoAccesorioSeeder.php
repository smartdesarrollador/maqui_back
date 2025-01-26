<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoAccesorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('tipo_accesorios')->insert([
            'nombre' => 'Casco',
            'descripcion' => 'Equipo de protección para la cabeza',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_accesorios')->insert([
            'nombre' => 'Guantes',
            'descripcion' => 'Protección para las manos',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_accesorios')->insert([
            'nombre' => 'Chaqueta',
            'descripcion' => 'Protección para el torso y brazos',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_accesorios')->insert([
            'nombre' => 'Botas',
            'descripcion' => 'Calzado especializado para motociclistas',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_accesorios')->insert([
            'nombre' => 'Pantalón',
            'descripcion' => 'Protección para las piernas',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
