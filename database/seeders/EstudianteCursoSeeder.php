<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EstudianteCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 1,
            'curso_id' => 1,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.5,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 1,
            'curso_id' => 2,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 3.8,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 2,
            'curso_id' => 1,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 2,
            'curso_id' => 3,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.7,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 3,
            'curso_id' => 2,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 3.5,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 3,
            'curso_id' => 4,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 4,
            'curso_id' => 3,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.8,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 4,
            'curso_id' => 5,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 5,
            'curso_id' => 1,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 3.9,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 5,
            'curso_id' => 4,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 6,
            'curso_id' => 2,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.6,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 6,
            'curso_id' => 5,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.0,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 7,
            'curso_id' => 3,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 3.7,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 8,
            'curso_id' => 4,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('estudiante_curso')->insert([
            'estudiante_id' => 8,
            'curso_id' => 5,
            'fecha_inscripcion' => $horaActual,
            'calificacion' => 4.9,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        
        
    }
}
