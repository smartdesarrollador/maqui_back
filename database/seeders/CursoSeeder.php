<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('cursos')->insert([
            'nombre' => 'Curso de Programación',
            'descripcion' => 'Curso de programación básica',
            'precio' => 100.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cursos')->insert([
            'nombre' => 'Curso de Diseño Web',
            'descripcion' => 'Aprende HTML, CSS y JavaScript desde cero',
            'precio' => 150.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cursos')->insert([
            'nombre' => 'Curso de Base de Datos',
            'descripcion' => 'Fundamentos de SQL y diseño de bases de datos',
            'precio' => 120.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cursos')->insert([
            'nombre' => 'Curso de PHP Laravel',
            'descripcion' => 'Desarrollo web con el framework Laravel',
            'precio' => 200.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cursos')->insert([
            'nombre' => 'Curso de DevOps',
            'descripcion' => 'Introducción a las prácticas DevOps y herramientas',
            'precio' => 180.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
