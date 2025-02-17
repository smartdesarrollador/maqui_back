<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('estudiantes')->insert([
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com', 
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiantes')->insert([
            'nombre' => 'María García',
            'email' => 'maria.garcia@example.com',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiantes')->insert([
            'nombre' => 'Carlos Rodríguez',
            'email' => 'carlos.rodriguez@example.com',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiantes')->insert([
            'nombre' => 'Ana Martínez',
            'email' => 'ana.martinez@example.com',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiantes')->insert([
            'nombre' => 'Pedro Sánchez',
            'email' => 'pedro.sanchez@example.com',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiantes')->insert([
            'nombre' => 'Laura López',
            'email' => 'laura.lopez@example.com',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiantes')->insert([
            'nombre' => 'Miguel Torres',
            'email' => 'miguel.torres@example.com',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiantes')->insert([
            'nombre' => 'Carmen Ruiz',
            'email' => 'carmen.ruiz@example.com',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiantes')->insert([
            'nombre' => 'José Morales',
            'email' => 'jose.morales@example.com',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiantes')->insert([
            'nombre' => 'Isabel Flores',
            'email' => 'isabel.flores@example.com',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
        
    }
}
