<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class motoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('motos')->insert([
            'modelo_id' => 1,
            'tipo_moto_id' => 1,
            'año' => 2024,
            'precio_base' => 3500.00,
            'color' => 'Negro',
            'stock' => 10,
            'descripcion' => 'Moto deportiva de alto rendimiento',
            'imagen' => 'assets/imagen/motos/moto1.jpg',
            'cilindrada' => 150.0,
            'motor' => '4 tiempos OHC',
            'potencia' => '15 HP a 8500 rpm',
            'arranque' => 'Eléctrico',
            'transmision' => '5 velocidades',
            'capacidad_tanque' => 12.5,
            'peso_neto' => 120,
            'carga_util' => 150,
            'peso_bruto' => 270,
            'largo' => 2000,
            'ancho' => 800, 
            'alto' => 1100,
            'neumatico_delantero' => '90/90-17',
            'neumatico_posterior' => '120/80-17',
            'freno_delantero' => 'Disco',
            'freno_posterior' => 'Tambor',
            'cargador_usb' => true,
            'luz_led' => true,
            'alarma' => true,
            'cajuela' => false,
            'tablero_led' => true,
            'mp3' => false,
            'bluetooth' => false,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('motos')->insert([
            'modelo_id' => 2,
            'tipo_moto_id' => 2,
            'año' => 2024,
            'precio_base' => 4200.00,
            'color' => 'Rojo',
            'stock' => 8,
            'descripcion' => 'Moto tipo scooter ideal para ciudad',
            'imagen' => 'assets/imagen/motos/moto2.jpg',
            'cilindrada' => 125.0,
            'motor' => '4 tiempos SOHC',
            'potencia' => '12 HP a 8000 rpm',
            'arranque' => 'Eléctrico',
            'transmision' => 'Automática CVT',
            'capacidad_tanque' => 6.5,
            'peso_neto' => 95,
            'carga_util' => 130,
            'peso_bruto' => 225,
            'largo' => 1850,
            'ancho' => 700,
            'alto' => 1050,
            'neumatico_delantero' => '80/90-14',
            'neumatico_posterior' => '100/90-14',
            'freno_delantero' => 'Disco',
            'freno_posterior' => 'Disco',
            'cargador_usb' => true,
            'luz_led' => true,
            'alarma' => true,
            'cajuela' => true,
            'tablero_led' => true,
            'mp3' => true,
            'bluetooth' => true,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('motos')->insert([
            'modelo_id' => 3,
            'tipo_moto_id' => 3,
            'año' => 2024,
            'precio_base' => 5500.00,
            'color' => 'Azul',
            'stock' => 5,
            'descripcion' => 'Moto de aventura para todo terreno',
            'imagen' => 'assets/imagen/motos/moto3.jpg',
            'cilindrada' => 250.0,
            'motor' => '4 tiempos DOHC',
            'potencia' => '25 HP a 9000 rpm',
            'arranque' => 'Eléctrico',
            'transmision' => '6 velocidades',
            'capacidad_tanque' => 15.0,
            'peso_neto' => 145,
            'carga_util' => 170,
            'peso_bruto' => 315,
            'largo' => 2200,
            'ancho' => 850,
            'alto' => 1250,
            'neumatico_delantero' => '90/90-21',
            'neumatico_posterior' => '120/90-18',
            'freno_delantero' => 'Disco',
            'freno_posterior' => 'Disco',
            'cargador_usb' => true,
            'luz_led' => true,
            'alarma' => true,
            'cajuela' => false,
            'tablero_led' => true,
            'mp3' => false,
            'bluetooth' => true,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('motos')->insert([
            'modelo_id' => 4,
            'tipo_moto_id' => 4,
            'año' => 2024,
            'precio_base' => 2800.00,
            'color' => 'Blanco',
            'stock' => 15,
            'descripcion' => 'Moto urbana económica y eficiente',
            'imagen' => 'assets/imagen/motos/moto4.jpg',
            'cilindrada' => 110.0,
            'motor' => '4 tiempos OHC',
            'potencia' => '8.5 HP a 7500 rpm',
            'arranque' => 'Eléctrico y Pedal',
            'transmision' => '4 velocidades',
            'capacidad_tanque' => 4.5,
            'peso_neto' => 85,
            'carga_util' => 120,
            'peso_bruto' => 205,
            'largo' => 1800,
            'ancho' => 650,
            'alto' => 1000,
            'neumatico_delantero' => '70/90-17',
            'neumatico_posterior' => '80/90-17',
            'freno_delantero' => 'Tambor',
            'freno_posterior' => 'Tambor',
            'cargador_usb' => false,
            'luz_led' => false,
            'alarma' => false,
            'cajuela' => false,
            'tablero_led' => false,
            'mp3' => false,
            'bluetooth' => false,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('motos')->insert([
            'modelo_id' => 5,
            'tipo_moto_id' => 1,
            'año' => 2024,
            'precio_base' => 7500.00,
            'color' => 'Negro Mate',
            'stock' => 8,
            'descripcion' => 'Moto deportiva de alto rendimiento',
            'imagen' => 'assets/imagen/motos/moto5.jpg',
            'cilindrada' => 600.0,
            'motor' => '4 tiempos DOHC',
            'potencia' => '100 HP a 12000 rpm',
            'arranque' => 'Eléctrico',
            'transmision' => '6 velocidades',
            'capacidad_tanque' => 17.0,
            'peso_neto' => 190,
            'carga_util' => 180,
            'peso_bruto' => 370,
            'largo' => 2100,
            'ancho' => 730,
            'alto' => 1150,
            'neumatico_delantero' => '120/70-17',
            'neumatico_posterior' => '180/55-17',
            'freno_delantero' => 'Disco doble',
            'freno_posterior' => 'Disco',
            'cargador_usb' => true,
            'luz_led' => true,
            'alarma' => true,
            'cajuela' => false,
            'tablero_led' => true,
            'mp3' => false,
            'bluetooth' => true,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('motos')->insert([
            'modelo_id' => 6,
            'tipo_moto_id' => 2,
            'año' => 2024,
            'precio_base' => 4200.00,
            'color' => 'Rojo',
            'stock' => 12,
            'descripcion' => 'Scooter premium con características avanzadas',
            'imagen' => 'assets/imagen/motos/moto6.jpg',
            'cilindrada' => 150.0,
            'motor' => '4 tiempos OHC',
            'potencia' => '15 HP a 8000 rpm',
            'arranque' => 'Eléctrico',
            'transmision' => 'Automática CVT',
            'capacidad_tanque' => 7.0,
            'peso_neto' => 110,
            'carga_util' => 150,
            'peso_bruto' => 260,
            'largo' => 1900,
            'ancho' => 700,
            'alto' => 1150,
            'neumatico_delantero' => '100/80-14',
            'neumatico_posterior' => '120/70-14',
            'freno_delantero' => 'Disco',
            'freno_posterior' => 'Tambor',
            'cargador_usb' => true,
            'luz_led' => true,
            'alarma' => true,
            'cajuela' => true,
            'tablero_led' => true,
            'mp3' => true,
            'bluetooth' => true,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('motos')->insert([
            'modelo_id' => 7,
            'tipo_moto_id' => 3,
            'año' => 2024,
            'precio_base' => 6800.00,
            'color' => 'Verde',
            'stock' => 6,
            'descripcion' => 'Moto todo terreno para aventuras extremas',
            'imagen' => 'assets/imagen/motos/moto7.jpg',
            'cilindrada' => 450.0,
            'motor' => '4 tiempos DOHC',
            'potencia' => '45 HP a 9500 rpm',
            'arranque' => 'Eléctrico',
            'transmision' => '6 velocidades',
            'capacidad_tanque' => 18.0,
            'peso_neto' => 160,
            'carga_util' => 180,
            'peso_bruto' => 340,
            'largo' => 2300,
            'ancho' => 900,
            'alto' => 1400,
            'neumatico_delantero' => '90/90-21',
            'neumatico_posterior' => '130/90-18',
            'freno_delantero' => 'Disco',
            'freno_posterior' => 'Disco',
            'cargador_usb' => true,
            'luz_led' => true,
            'alarma' => true,
            'cajuela' => false,
            'tablero_led' => true,
            'mp3' => false,
            'bluetooth' => true,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('motos')->insert([
            'modelo_id' => 8,
            'tipo_moto_id' => 1,
            'año' => 2024,
            'precio_base' => 9500.00,
            'color' => 'Gris Titanio',
            'stock' => 4,
            'descripcion' => 'Superbike de alto rendimiento',
            'imagen' => 'assets/imagen/motos/moto8.jpg',
            'cilindrada' => 1000.0,
            'motor' => '4 tiempos DOHC',
            'potencia' => '180 HP a 13000 rpm',
            'arranque' => 'Eléctrico',
            'transmision' => '6 velocidades',
            'capacidad_tanque' => 16.0,
            'peso_neto' => 200,
            'carga_util' => 190,
            'peso_bruto' => 390,
            'largo' => 2080,
            'ancho' => 750,
            'alto' => 1145,
            'neumatico_delantero' => '120/70-17',
            'neumatico_posterior' => '190/55-17',
            'freno_delantero' => 'Disco doble',
            'freno_posterior' => 'Disco',
            'cargador_usb' => true,
            'luz_led' => true,
            'alarma' => true,
            'cajuela' => false,
            'tablero_led' => true,
            'mp3' => false,
            'bluetooth' => true,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('motos')->insert([
            'modelo_id' => 9,
            'tipo_moto_id' => 4,
            'año' => 2024,
            'precio_base' => 3200.00,
            'color' => 'Azul Metálico',
            'stock' => 20,
            'descripcion' => 'Moto urbana versátil y confortable',
            'imagen' => 'assets/imagen/motos/moto9.jpg',
            'cilindrada' => 125.0,
            'motor' => '4 tiempos OHC',
            'potencia' => '12 HP a 8000 rpm',
            'arranque' => 'Eléctrico',
            'transmision' => '5 velocidades',
            'capacidad_tanque' => 5.5,
            'peso_neto' => 95,
            'carga_util' => 130,
            'peso_bruto' => 225,
            'largo' => 1850,
            'ancho' => 680,
            'alto' => 1050,
            'neumatico_delantero' => '80/90-17',
            'neumatico_posterior' => '90/90-17',
            'freno_delantero' => 'Disco',
            'freno_posterior' => 'Tambor',
            'cargador_usb' => true,
            'luz_led' => true,
            'alarma' => true,
            'cajuela' => false,
            'tablero_led' => true,
            'mp3' => false,
            'bluetooth' => false,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
