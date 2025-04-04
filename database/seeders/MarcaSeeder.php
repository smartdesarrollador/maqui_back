<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('marcas')->insert([
            'nombre' => 'Alaska',
            'origen' => 'Japón',
            'fundacion' => '1948',
            'logo' => 'https://example.com/honda.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Berlin',
            'origen' => 'Japón', 
            'fundacion' => '1955',
            'logo' => 'https://example.com/yamaha.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Cali',
            'origen' => 'Japón',
            'fundacion' => '1955',
            'logo' => 'https://example.com/kawasaki.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Cheyenne',
            'origen' => 'Japón',
            'fundacion' => '1909',
            'logo' => 'https://example.com/suzuki.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Dakota',
            'origen' => 'Alemania',
            'fundacion' => '1923',
            'logo' => 'https://example.com/bmw.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Detroit',
            'origen' => 'Italia',
            'fundacion' => '1926',
            'logo' => 'https://example.com/ducati.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Hummer',
            'origen' => 'Austria',
            'fundacion' => '1934',
            'logo' => 'https://example.com/ktm.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Ibiza',
            'origen' => 'Reino Unido',
            'fundacion' => '1902',
            'logo' => 'https://example.com/triumph.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Manhattan',
            'origen' => 'Estados Unidos',
            'fundacion' => '1903',
            'logo' => 'https://example.com/harley.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Murano',
            'origen' => 'Italia',
            'fundacion' => '1945',
            'logo' => 'https://example.com/aprilia.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Nairobi',
            'origen' => 'España',
            'fundacion' => '1951',
            'logo' => 'https://example.com/valencia.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Rio',
            'origen' => 'Japón',
            'fundacion' => '1963',
            'logo' => 'https://example.com/tokio.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Seul',
            'origen' => 'Alemania',
            'fundacion' => '1972',
            'logo' => 'https://example.com/berlin.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Shogun',
            'origen' => 'China',
            'fundacion' => '1985',
            'logo' => 'https://example.com/shanghai.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Tekken',
            'origen' => 'Australia',
            'fundacion' => '1992',
            'logo' => 'https://example.com/sydney.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Xparta',
            'origen' => 'Canadá',
            'fundacion' => '1978',
            'logo' => 'https://example.com/toronto.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
