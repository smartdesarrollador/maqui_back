<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nombre' => 'Lorem ipsum',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lorem ipsum',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lorem ipsum',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lorem ipsum',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lorem ipsum',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lorem ipsum',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lorem ipsum',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lorem ipsum',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
