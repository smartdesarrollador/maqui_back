<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
    [
        'id_articulo' => 1, // Asumimos que el post con ID 1 existe
        'nombre_comentarista' => 'Usuario1',
        'contenido' => 'Este es un comentario en el primer post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 1,
        'nombre_comentarista' => 'Usuario2',
        'contenido' => 'Este es otro comentario en el primer post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'id_articulo' => 2,
        'nombre_comentarista' => 'Usuario3',
        'contenido' => 'Este es un comentario en el segundo post.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    
]);

    }
}
