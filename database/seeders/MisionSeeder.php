<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        //
        DB::table('mision')->insert([
            'id_mision' => 1,
            'imagen_mision' => "mision.jpg",
            'url_imagen_mision' => "assets/imagen/mision/mision.jpg",
            'titulo_mision' => 'Titulo Misión',
            'contenido_mision' => 'Asesorar, capacitar y formar profesionales en analitica de datos mediante el uso de software más requeridas del mercado',
            'contenido_vision' => 'Ser una empresa líder en capacitación y asesoría del mercado analítico y transformación digital',
            'contenido_valores' => 'Compromiso, enfoque, responsabilidad y confidencialidad',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
