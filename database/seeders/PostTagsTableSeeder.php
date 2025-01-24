<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_tags')->insert([
    [
        'id_articulo' => 1, // Post 1 tiene la etiqueta 1
        'id_etiqueta' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 2, // Post 2 tiene la etiqueta 2
        'id_etiqueta' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 3, // Post 3 tiene la etiqueta 3
        'id_etiqueta' => 3,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 4, // Post 4 tiene la etiqueta 4
        'id_etiqueta' => 4,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 5, // Post 5 tiene la etiqueta 5
        'id_etiqueta' => 5,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 6, // Post 6 tiene la etiqueta 6
        'id_etiqueta' => 6,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 7, // Post 7 tiene la etiqueta 7
        'id_etiqueta' => 7,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 8, // Post 8 tiene la etiqueta 8
        'id_etiqueta' => 8,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 9, // Post 9 tiene la etiqueta 9
        'id_etiqueta' => 9,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 10, // Post 10 tiene la etiqueta 10
        'id_etiqueta' => 10,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 1, // Post 1 tiene la etiqueta 2
        'id_etiqueta' => 2,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 2, // Post 2 tiene la etiqueta 3
        'id_etiqueta' => 3,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 3, // Post 3 tiene la etiqueta 4
        'id_etiqueta' => 4,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 4, // Post 4 tiene la etiqueta 5
        'id_etiqueta' => 5,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 5, // Post 5 tiene la etiqueta 6
        'id_etiqueta' => 6,
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

    }
}
