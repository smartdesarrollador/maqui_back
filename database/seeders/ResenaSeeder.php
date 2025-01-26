<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ResenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('resenas')->insert([
            'cliente_id' => 1,
            'moto_id' => 1,
            'calificacion' => 4,
            'comentario' => 'Excelente servicio y atención al cliente',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('resenas')->insert([
            'cliente_id' => 2,
            'moto_id' => 2,
            'calificacion' => 5,
            'comentario' => 'La moto está en excelentes condiciones, muy satisfecho',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('resenas')->insert([
            'cliente_id' => 3,
            'moto_id' => 3,
            'calificacion' => 3,
            'comentario' => 'Buen servicio pero podrían mejorar los tiempos de entrega',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('resenas')->insert([
            'cliente_id' => 1,
            'moto_id' => 4,
            'calificacion' => 5,
            'comentario' => 'Muy profesionales en su trabajo, recomendado',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('resenas')->insert([
            'cliente_id' => 2,
            'moto_id' => 5,
            'calificacion' => 4,
            'comentario' => 'Buenos precios y excelente calidad',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('resenas')->insert([
            'cliente_id' => 3,
            'moto_id' => 1,
            'calificacion' => 5,
            'comentario' => 'El personal muy amable y servicial',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('resenas')->insert([
            'cliente_id' => 1,
            'moto_id' => 2,
            'calificacion' => 4,
            'comentario' => 'Buena relación calidad-precio',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('resenas')->insert([
            'cliente_id' => 2,
            'moto_id' => 3,
            'calificacion' => 3,
            'comentario' => 'Servicio aceptable pero con margen de mejora',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('resenas')->insert([
            'cliente_id' => 3,
            'moto_id' => 4,
            'calificacion' => 5,
            'comentario' => 'Excelente asesoramiento en la compra',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('resenas')->insert([
            'cliente_id' => 1,
            'moto_id' => 5,
            'calificacion' => 4,
            'comentario' => 'Muy satisfecho con la atención recibida',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
