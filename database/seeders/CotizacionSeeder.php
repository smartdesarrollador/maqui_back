<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CotizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('cotizaciones')->insert([
            'cliente_id' => 1,
            'moto_id' => 1,
            'precio_total' => 299.99,
            'estado' => 'pendiente', 
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizaciones')->insert([
            'cliente_id' => 2,
            'moto_id' => 2,
            'precio_total' => 450.50,
            'estado' => 'aprobado',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizaciones')->insert([
            'cliente_id' => 3,
            'moto_id' => 1,
            'precio_total' => 199.99,
            'estado' => 'rechazado',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizaciones')->insert([
            'cliente_id' => 4,
            'moto_id' => 3,
            'precio_total' => 599.99,
            'estado' => 'pendiente',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizaciones')->insert([
            'cliente_id' => 5,
            'moto_id' => 2,
            'precio_total' => 349.99,
            'estado' => 'aprobado',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizaciones')->insert([
            'cliente_id' => 1,
            'moto_id' => 3,
            'precio_total' => 799.99,
            'estado' => 'pendiente',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizaciones')->insert([
            'cliente_id' => 2,
            'moto_id' => 1,
            'precio_total' => 259.99,
            'estado' => 'rechazado',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizaciones')->insert([
            'cliente_id' => 3,
            'moto_id' => 2,
            'precio_total' => 399.99,
            'estado' => 'aprobado',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizaciones')->insert([
            'cliente_id' => 4,
            'moto_id' => 1,
            'precio_total' => 289.99,
            'estado' => 'pendiente',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('cotizaciones')->insert([
            'cliente_id' => 5,
            'moto_id' => 3,
            'precio_total' => 699.99,
            'estado' => 'aprobado',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
