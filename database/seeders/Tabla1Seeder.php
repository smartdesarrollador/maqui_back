<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Tabla1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $text1 = '<p><strong class="ql-size-large"><em>Sed ut perspiciatis unde omnis iste natus </em></strong></p><p><br></p><blockquote><span class="ql-size-large">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></blockquote><p><br></p><p><strong class="ql-size-large"><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit</em></strong></p><p><br></p><p><span class="ql-size-large">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</span></p>';

        for ($i = 0; $i < 10; $i++) {
            DB::table('tabla1')->insert([
                'varchar1' => $faker->word,
                'varchar2' => $faker->word,
                'varchar3' => $faker->word,
                'varchar4' => $faker->word,
                'varchar5' => $faker->word,
                'varchar6' => $faker->word,
                'varchar7' => 'assets/imagen/tabla1/imagen' . $i + 1 . '.jpg', // Genera imagen1.png, imagen2.png, ..., imagen10.png
                'decimal1' => $faker->randomFloat(2, 0, 10000),
                'decimal2' => $faker->randomFloat(2, 0, 10000),
                'decimal3' => $faker->randomFloat(2, 0, 10000),
                'text1' => $text1,
                'text2' => $faker->sentence,
                'text3' => $faker->paragraph,
                'boolean1' => $faker->boolean,
                'date1' => $faker->date,
                'time1' => $faker->time,
                'categoria1_id' => $faker->numberBetween(1, 10), // Asignando una relación con categoria1
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
