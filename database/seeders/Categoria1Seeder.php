<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Categoria1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $text1 = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

        for ($i = 0; $i < 10; $i++) {
             DB::table('categoria1')->insert([
                'varchar1' => $faker->word,
                'varchar2' => $faker->word,
                'varchar3' => 'assets/imagen/categoria1/categoria' . $i + 1 . '.png', // Genera imagen1.png, imagen2.png, ..., imagen10.png
                'text1' => $text1,
                'boolean1' => $faker->boolean,
                'date1' => $faker->date,
                'time1' => $faker->time,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
