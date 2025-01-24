<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

         DB::table('feedbacks')->insert([
            'reaction' => "true",
            'message' => "Lorem ipsum dolor sit amet consectetur adipisicing elit",
            'date' => "2023-05-01",
            'time' => null,
            'pedido_id' => 1, 
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
