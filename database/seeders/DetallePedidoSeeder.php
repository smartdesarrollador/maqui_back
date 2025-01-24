<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DetallePedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('detalle_pedidos')->insert([
            'pedido_id' => 1,
            'producto_id' => 1,
            'cantidad' => 1,
            'item_descripcion' => "Lorem ipsum dolor sit amet consectetur adipisicing", 
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
