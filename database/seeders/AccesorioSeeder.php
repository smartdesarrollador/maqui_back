<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccesorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('accesorios')->insert([
            'nombre' => 'Casco Integral',
            'tipo' => 'Casco',
            'precio' => 199.99,
            'stock' => 10,
            'descripcion' => 'Casco integral de alta protección para motociclistas',
            'imagen' => 'casco_integral.jpg',
            'tipo_accesorio_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorios')->insert([
            'nombre' => 'Casco Modular',
            'tipo' => 'Casco',
            'precio' => 249.99,
            'stock' => 8,
            'descripcion' => 'Casco modular con mentonera abatible',
            'imagen' => 'casco_modular.jpg',
            'tipo_accesorio_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorios')->insert([
            'nombre' => 'Guantes de Cuero',
            'tipo' => 'Guantes',
            'precio' => 45.99,
            'stock' => 15,
            'descripcion' => 'Guantes de cuero con protección para nudillos',
            'imagen' => 'guantes_cuero.jpg',
            'tipo_accesorio_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorios')->insert([
            'nombre' => 'Guantes Impermeables',
            'tipo' => 'Guantes',
            'precio' => 55.99,
            'stock' => 12,
            'descripcion' => 'Guantes impermeables para clima frío',
            'imagen' => 'guantes_impermeables.jpg',
            'tipo_accesorio_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorios')->insert([
            'nombre' => 'Chaqueta de Cuero',
            'tipo' => 'Chaqueta',
            'precio' => 299.99,
            'stock' => 7,
            'descripcion' => 'Chaqueta de cuero con protecciones',
            'imagen' => 'chaqueta_cuero.jpg',
            'tipo_accesorio_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorios')->insert([
            'nombre' => 'Chaqueta Textil',
            'tipo' => 'Chaqueta',
            'precio' => 189.99,
            'stock' => 9,
            'descripcion' => 'Chaqueta textil ventilada para verano',
            'imagen' => 'chaqueta_textil.jpg',
            'tipo_accesorio_id' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorios')->insert([
            'nombre' => 'Botas Racing',
            'tipo' => 'Botas',
            'precio' => 159.99,
            'stock' => 6,
            'descripcion' => 'Botas deportivas para motociclismo',
            'imagen' => 'botas_racing.jpg',
            'tipo_accesorio_id' => 4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorios')->insert([
            'nombre' => 'Botas Touring',
            'tipo' => 'Botas',
            'precio' => 179.99,
            'stock' => 8,
            'descripcion' => 'Botas impermeables para viajes largos',
            'imagen' => 'botas_touring.jpg',
            'tipo_accesorio_id' => 4,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorios')->insert([
            'nombre' => 'Pantalón Kevlar',
            'tipo' => 'Pantalón',
            'precio' => 149.99,
            'stock' => 11,
            'descripcion' => 'Pantalón vaquero con refuerzos de kevlar',
            'imagen' => 'pantalon_kevlar.jpg',
            'tipo_accesorio_id' => 5,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('accesorios')->insert([
            'nombre' => 'Pantalón Textil',
            'tipo' => 'Pantalón',
            'precio' => 129.99,
            'stock' => 13,
            'descripcion' => 'Pantalón textil con protecciones',
            'imagen' => 'pantalon_textil.jpg',
            'tipo_accesorio_id' => 5,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
