<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('roles_usuarios')->insert([
            'id_rol_user' => 1,
            'id_rol' => 1,
            'id_user' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('roles_usuarios')->insert([
            'id_rol_user' => 2,
            'id_rol' => 2,
            'id_user' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('roles_usuarios')->insert([
            'id_rol_user' => 3,
            'id_rol' => 3,
            'id_user' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
