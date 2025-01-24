<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermisosRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();
        
       DB::table('permisos_roles')->insert([
            'id_permiso_rol' => 1,
            'id_permiso' => 1,
            'id_rol' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('permisos_roles')->insert([
            'id_permiso_rol' => 2,
            'id_permiso' => 2,
            'id_rol' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('permisos_roles')->insert([
            'id_permiso_rol' => 3,
            'id_permiso' => 3,
            'id_rol' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
