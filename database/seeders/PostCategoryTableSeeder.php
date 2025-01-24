<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_categories')->insert([
    [
        'id_post' => 1,
        'id_categoria' => 1,
    ],
    [
        'id_post' => 1,
        'id_categoria' => 2,
    ],
    [
        'id_post' => 2,
        'id_categoria' => 1,
    ],
    [
        'id_post' => 2,
        'id_categoria' => 3,
    ],
    [
        'id_post' => 3,
        'id_categoria' => 2,
    ],
    [
        'id_post' => 3,
        'id_categoria' => 4,
    ],
    [
        'id_post' => 4,
        'id_categoria' => 3,
    ],
    [
        'id_post' => 4,
        'id_categoria' => 5,
    ],
    [
        'id_post' => 5,
        'id_categoria' => 4,
    ],
    [
        'id_post' => 5,
        'id_categoria' => 6,
    ],
    [
        'id_post' => 6,
        'id_categoria' => 1,
    ],
    [
        'id_post' => 6,
        'id_categoria' => 3,
    ],
    [
        'id_post' => 7,
        'id_categoria' => 2,
    ],
    [
        'id_post' => 7,
        'id_categoria' => 4,
    ],
    [
        'id_post' => 8,
        'id_categoria' => 5,
    ],
    [
        'id_post' => 8,
        'id_categoria' => 6,
    ],
    [
        'id_post' => 9,
        'id_categoria' => 1,
    ],
    [
        'id_post' => 9,
        'id_categoria' => 5,
    ],
    [
        'id_post' => 10,
        'id_categoria' => 3,
    ],
    [
        'id_post' => 10,
        'id_categoria' => 6,
    ],
    [
        'id_post' => 1,
        'id_categoria' => 7,
    ],
    [
        'id_post' => 4,
        'id_categoria' => 7,
    ],
    [
        'id_post' => 7,
        'id_categoria' => 7,
    ],
    [
        'id_post' => 2,
        'id_categoria' => 8,
    ],
    [
        'id_post' => 9,
        'id_categoria' => 8,
    ],
    [
        'id_post' => 14,
        'id_categoria' => 8,
    ],
]);

    }
}
