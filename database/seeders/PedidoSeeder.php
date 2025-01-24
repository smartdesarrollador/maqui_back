<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

       DB::table('pedidos')->insert([
            'cliente_id' => 1,
            'telefono' => "928238817",
            'fecha_pedido' => "2023-05-01",
            'precio_total' => 1000,
            'horario_pedido' => "01:08:40",
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
