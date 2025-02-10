<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FinanciamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 1,
            'cliente_id' => 1,
            'monto_financiado' => 15000.00,
            'plazo' => 24,
            'interes' => 12.5,
            'cuota_mensual' => 750.00,
            'fecha_inicio' => '2024-01-25',
            'fecha_fin' => '2026-01-25',
            'estado' => 'activo', 
            'situacion_laboral' => 'Dependiente',
            'cuota_inicial' => 3000.00,
            'ingreso_mensual' => 4500.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 2,
            'cliente_id' => 2,
            'monto_financiado' => 18000.00,
            'plazo' => 36,
            'interes' => 13.5,
            'cuota_mensual' => 650.00,
            'fecha_inicio' => '2024-02-01',
            'fecha_fin' => '2027-02-01',
            'estado' => 'activo',
            'situacion_laboral' => 'Independiente', 
            'cuota_inicial' => 4000.00,
            'ingreso_mensual' => 5000.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 3,
            'cliente_id' => 3,
            'monto_financiado' => 12000.00,
            'plazo' => 18,
            'interes' => 11.5,
            'cuota_mensual' => 800.00,
            'fecha_inicio' => '2024-02-15',
            'fecha_fin' => '2025-08-15',
            'estado' => 'activo',
            'situacion_laboral' => 'Dependiente',
            'cuota_inicial' => 2500.00,
            'ingreso_mensual' => 4000.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 4,
            'cliente_id' => 4,
            'monto_financiado' => 20000.00,
            'plazo' => 48,
            'interes' => 14.0,
            'cuota_mensual' => 600.00,
            'fecha_inicio' => '2024-03-01',
            'fecha_fin' => '2028-03-01',
            'estado' => 'activo',
            'situacion_laboral' => 'Independiente',
            'cuota_inicial' => 5000.00,
            'ingreso_mensual' => 6000.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 5,
            'cliente_id' => 5,
            'monto_financiado' => 16000.00,
            'plazo' => 30,
            'interes' => 12.8,
            'cuota_mensual' => 700.00,
            'fecha_inicio' => '2024-03-15',
            'fecha_fin' => '2026-09-15',
            'estado' => 'activo',
            'situacion_laboral' => 'Dependiente',
            'cuota_inicial' => 3500.00,
            'ingreso_mensual' => 4800.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 6,
            'cliente_id' => 6,
            'monto_financiado' => 22000.00,
            'plazo' => 42,
            'interes' => 13.8,
            'cuota_mensual' => 680.00,
            'fecha_inicio' => '2024-04-01',
            'fecha_fin' => '2027-10-01',
            'estado' => 'activo',
            'situacion_laboral' => 'Independiente',
            'cuota_inicial' => 5500.00,
            'ingreso_mensual' => 7000.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 7,
            'cliente_id' => 7,
            'monto_financiado' => 14000.00,
            'plazo' => 24,
            'interes' => 12.0,
            'cuota_mensual' => 720.00,
            'fecha_inicio' => '2024-04-15',
            'fecha_fin' => '2026-04-15',
            'estado' => 'activo',
            'situacion_laboral' => 'Dependiente',
            'cuota_inicial' => 2800.00,
            'ingreso_mensual' => 4200.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 8,
            'cliente_id' => 8,
            'monto_financiado' => 19000.00,
            'plazo' => 36,
            'interes' => 13.2,
            'cuota_mensual' => 670.00,
            'fecha_inicio' => '2024-05-01',
            'fecha_fin' => '2027-05-01',
            'estado' => 'activo',
            'situacion_laboral' => 'Independiente',
            'cuota_inicial' => 4200.00,
            'ingreso_mensual' => 5500.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 9,
            'cliente_id' => 9,
            'monto_financiado' => 17000.00,
            'plazo' => 30,
            'interes' => 12.6,
            'cuota_mensual' => 710.00,
            'fecha_inicio' => '2024-05-15',
            'fecha_fin' => '2026-11-15',
            'estado' => 'activo',
            'situacion_laboral' => 'Dependiente',
            'cuota_inicial' => 3700.00,
            'ingreso_mensual' => 4900.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 10,
            'cliente_id' => 10,
            'monto_financiado' => 21000.00,
            'plazo' => 48,
            'interes' => 13.9,
            'cuota_mensual' => 590.00,
            'fecha_inicio' => '2024-06-01',
            'fecha_fin' => '2028-06-01',
            'estado' => 'activo',
            'situacion_laboral' => 'Independiente',
            'cuota_inicial' => 5200.00,
            'ingreso_mensual' => 6500.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('financiamientos')->insert([
            'cotizacion_id' => 1,
            'cliente_id' => 1,
            'monto_financiado' => 13000.00,
            'plazo' => 24,
            'interes' => 12.2,
            'cuota_mensual' => 640.00,
            'fecha_inicio' => '2024-06-15',
            'fecha_fin' => '2026-06-15',
            'estado' => 'activo',
            'situacion_laboral' => 'Dependiente',
            'cuota_inicial' => 3200.00,
            'ingreso_mensual' => 4600.00,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        
            
        
    }
}
