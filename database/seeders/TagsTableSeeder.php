<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
    [
        'nombre' => 'Ansiedad',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Depresión',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Estrés',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Terapia Cognitivo Conductual',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Autoestima',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Mindfulness',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Psicoanálisis',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Trastornos de personalidad',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Emociones',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Relaciones interpersonales',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Desarrollo personal',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Salud mental',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Motivación',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Autoeficacia',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'nombre' => 'Resiliencia',
        'created_at' => now(),
        'updated_at' => now(),
    ]
]);

    }
}
