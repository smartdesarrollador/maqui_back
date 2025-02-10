<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RepuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('repuestos')->insert([
            'nombre' => 'Filtro de Aceite',
            'tipo' => 'Motor', 
            'precio' => 29.99,
            'stock' => 50,
            'descripcion' => 'Filtro de aceite de alta calidad para motores',
            'imagen' => 'assets/imagen/repuestos/imagen1.jpg',
            'tipo_repuesto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Pastillas de Freno',
            'tipo' => 'Frenos',
            'precio' => 45.99, 
            'stock' => 40,
            'descripcion' => 'Pastillas de freno de alto rendimiento',
            'imagen' => 'assets/imagen/repuestos/imagen2.jpg',
            'tipo_repuesto_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Bujías',
            'tipo' => 'Motor',
            'precio' => 15.99,
            'stock' => 100,
            'descripcion' => 'Bujías de encendido de larga duración',
            'imagen' => 'assets/imagen/repuestos/imagen3.jpg',
            'tipo_repuesto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Amortiguadores',
            'tipo' => 'Suspensión',
            'precio' => 89.99,
            'stock' => 30,
            'descripcion' => 'Amortiguadores de alta resistencia',
            'imagen' => 'assets/imagen/repuestos/imagen4.jpg',
            'tipo_repuesto_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Cadena de Transmisión',
            'tipo' => 'Transmisión',
            'precio' => 59.99,
            'stock' => 45,
            'descripcion' => 'Cadena de transmisión reforzada',
            'imagen' => 'assets/imagen/repuestos/imagen5.jpg',
            'tipo_repuesto_id' => 4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Kit de Embrague',
            'tipo' => 'Transmisión',
            'precio' => 129.99,
            'stock' => 25,
            'descripcion' => 'Kit completo de embrague',
            'imagen' => 'assets/imagen/repuestos/imagen6.jpg',
            'tipo_repuesto_id' => 4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Batería',
            'tipo' => 'Eléctrico',
            'precio' => 79.99,
            'stock' => 35,
            'descripcion' => 'Batería de alto rendimiento',
            'imagen' => 'assets/imagen/repuestos/imagen7.jpg',
            'tipo_repuesto_id' => 5,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Disco de Freno',
            'tipo' => 'Frenos',
            'precio' => 69.99,
            'stock' => 30,
            'descripcion' => 'Disco de freno ventilado',
            'imagen' => 'assets/imagen/repuestos/imagen8.jpg',
            'tipo_repuesto_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Radiador',
            'tipo' => 'Refrigeración',
            'precio' => 149.99,
            'stock' => 20,
            'descripcion' => 'Radiador de aluminio de alta eficiencia',
            'imagen' => 'assets/imagen/repuestos/imagen9.jpg',
            'tipo_repuesto_id' => 6,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Bomba de Aceite',
            'tipo' => 'Motor',
            'precio' => 89.99,
            'stock' => 25,
            'descripcion' => 'Bomba de aceite de alto flujo',
            'imagen' => 'assets/imagen/repuestos/imagen10.jpg',
            'tipo_repuesto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('repuestos')->insert([
            'nombre' => 'Kit de embrague',
            'tipo' => 'Transmisión',
            'precio' => 129.99,
            'stock' => 25,
            'descripcion' => 'Kit completo de embrague',
            'imagen' => 'assets/imagen/repuestos/imagen11.jpg',
            'tipo_repuesto_id' => 4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
        
    }
}
