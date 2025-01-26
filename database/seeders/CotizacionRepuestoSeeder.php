<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CotizacionRepuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 1,
            'repuesto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 1,
            'repuesto_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 2,
            'repuesto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 2,
            'repuesto_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 3,
            'repuesto_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 3,
            'repuesto_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 4,
            'repuesto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 4,
            'repuesto_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 5,
            'repuesto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizacion_repuesto')->insert([
            'cotizacion_id' => 5,
            'repuesto_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
