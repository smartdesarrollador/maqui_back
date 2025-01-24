<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

      DB::table('roles')->insert([
            'id_rol' => 1,
            'nombre' => "Admin",
            'descripcion' => "Administrador del sistema",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('roles')->insert([
            'id_rol' => 2,
            'nombre' => "Empleador",
            'descripcion' => "Empresa",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('roles')->insert([
            'id_rol' => 3,
            'nombre' => "Trabajador",
            'descripcion' => "Trabajador",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
