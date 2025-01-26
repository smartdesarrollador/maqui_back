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
            'nombre' => 'Honda',
            'origen' => 'Japón',
            'fundacion' => '1948',
            'logo' => 'https://example.com/honda.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Yamaha',
            'origen' => 'Japón', 
            'fundacion' => '1955',
            'logo' => 'https://example.com/yamaha.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Kawasaki',
            'origen' => 'Japón',
            'fundacion' => '1955',
            'logo' => 'https://example.com/kawasaki.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Suzuki',
            'origen' => 'Japón',
            'fundacion' => '1909',
            'logo' => 'https://example.com/suzuki.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'BMW Motorrad',
            'origen' => 'Alemania',
            'fundacion' => '1923',
            'logo' => 'https://example.com/bmw.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Ducati',
            'origen' => 'Italia',
            'fundacion' => '1926',
            'logo' => 'https://example.com/ducati.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'KTM',
            'origen' => 'Austria',
            'fundacion' => '1934',
            'logo' => 'https://example.com/ktm.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Triumph',
            'origen' => 'Reino Unido',
            'fundacion' => '1902',
            'logo' => 'https://example.com/triumph.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Harley-Davidson',
            'origen' => 'Estados Unidos',
            'fundacion' => '1903',
            'logo' => 'https://example.com/harley.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('marcas')->insert([
            'nombre' => 'Aprilia',
            'origen' => 'Italia',
            'fundacion' => '1945',
            'logo' => 'https://example.com/aprilia.png',
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
