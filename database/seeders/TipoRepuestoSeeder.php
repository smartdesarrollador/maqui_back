<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoRepuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Filtro de aceite',
            'descripcion' => 'Filtro para el sistema de lubricación del motor',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Filtro de aire',
            'descripcion' => 'Filtro para el sistema de admisión del motor',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Bujías',
            'descripcion' => 'Componente del sistema de encendido',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Pastillas de freno',
            'descripcion' => 'Componente del sistema de frenado',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Cadena',
            'descripcion' => 'Componente del sistema de transmisión',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Batería',
            'descripcion' => 'Componente del sistema eléctrico',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Neumáticos',
            'descripcion' => 'Componente de contacto con el suelo',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Kit de embrague',
            'descripcion' => 'Componente del sistema de transmisión',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Discos de freno',
            'descripcion' => 'Componente del sistema de frenado',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('tipo_repuestos')->insert([
            'nombre' => 'Piñones',
            'descripcion' => 'Componente del sistema de transmisión',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
