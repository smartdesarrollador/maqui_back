<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MediaCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('media_categories')->insert([
            'name' => 'Imagen',
            'slug' => 'imagen',
            'is_active' => true,
            'sort_order' => 0,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_categories')->insert([
            'name' => 'Video',
            'slug' => 'video',
            'is_active' => true,
            'sort_order' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_categories')->insert([
            'name' => 'Documento',
            'slug' => 'documento',
            'is_active' => true,
            'sort_order' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_categories')->insert([
            'name' => 'Audio',
            'slug' => 'audio',
            'is_active' => true,
            'sort_order' => 3,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        
        
    }
}
