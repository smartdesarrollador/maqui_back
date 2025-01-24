<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

       DB::table('permisos')->insert([
            'id_permiso' => 1,
            'nombre' => "Listar",
            'descripcion' => "Mostrar lista de datos",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('permisos')->insert([
            'id_permiso' => 2,
            'nombre' => "Crear",
            'descripcion' => "Crear un registro",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('permisos')->insert([
            'id_permiso' => 3,
            'nombre' => "Editar",
            'descripcion' => "Editar un registro",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('permisos')->insert([
            'id_permiso' => 4,
            'nombre' => "Eliminar",
            'descripcion' => "Eliminar un registro",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

         DB::table('permisos')->insert([
            'id_permiso' => 5,
            'nombre' => "Restaurar",
            'descripcion' => "Restaurar un registro",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

    }
}
