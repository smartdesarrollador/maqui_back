<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('contactos')->insert([
            'nombre' => "Juan",
            'correo' => "juan@testdominio.com",
            'telefono' => "939494509",
            'asunto' => "Informacion Curso",
            'mensaje' => "Solicito información del curso por favor",
        ]);

        DB::table('contactos')->insert([
            'nombre' => "Lucia",
            'correo' => "lucia@testdominio.com",
            'telefono' => "999393959",
            'asunto' => "Informacion",
            'mensaje' => "Solicito información",
        ]);

        DB::table('contactos')->insert([
            'nombre' => "Pedro",
            'correo' => "pedro@testdominio.com",
            'telefono' => "905845007",
            'asunto' => "Informacion de la Especialidad",
            'mensaje' => "Solicito información de la Especialidad por favor",
        ]);
    }
}
