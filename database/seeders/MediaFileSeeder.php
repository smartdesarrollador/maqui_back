<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MediaFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        DB::table('media_files')->insert([
            'file_name' => 'imagen1.jpg',
            'file_path' => 'assets/media/image/imagen1.jpg', 
            'file_type' => 'image',
            'file_size' => 1024,
            'mime_type' => 'image/jpeg',
            'extension' => 'jpg',
            'width' => 1024,
            'height' => 768,
            'duration' => 0,
            'description' => 'Imagen de prueba',
            'alt_text' => 'Imagen de prueba',
            'title' => 'Imagen de prueba',
            'is_public' => true,
            'sort_order' => 0,
            'category_id' => 1,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'imagen2.png',
            'file_path' => 'assets/media/image/imagen2.jpg',
            'file_type' => 'image',
            'file_size' => 2048,
            'mime_type' => 'image/jpeg',
            'extension' => 'png',
            'width' => 800,
            'height' => 600,
            'duration' => 0,
            'description' => 'Segunda imagen de prueba',
            'alt_text' => 'Segunda imagen de prueba',
            'title' => 'Segunda imagen de prueba',
            'is_public' => true,
            'sort_order' => 4,
            'category_id' => 1,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'imagen3.jpg',
            'file_path' => 'assets/media/image/imagen3.jpg',
            'file_type' => 'image',
            'file_size' => 2048,
            'mime_type' => 'image/jpeg',
            'extension' => 'jpg',
            'width' => 1920,
            'height' => 1080,
            'duration' => null,
            'description' => 'Tercera imagen de prueba',
            'alt_text' => 'Tercera imagen de prueba',
            'title' => 'Tercera imagen de prueba',
            'is_public' => true,
            'sort_order' => 8,
            'category_id' => 1,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'video1.mp4',
            'file_path' => 'assets/media/video/video1.mp4',
            'file_type' => 'video',
            'file_size' => 5120,
            'mime_type' => 'video/mp4',
            'extension' => 'mp4',
            'width' => 1920,
            'height' => 1080,
            'duration' => 120.5,
            'description' => 'Video de prueba',
            'alt_text' => 'Video de prueba',
            'title' => 'Video de prueba',
            'is_public' => true,
            'sort_order' => 1,
            'category_id' => 2,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'documento1.pdf',
            'file_path' => 'assets/media/documentos/documento1.pdf',
            'file_type' => 'document',
            'file_size' => 2048,
            'mime_type' => 'application/pdf',
            'extension' => 'pdf',
            'width' => null,
            'height' => null,
            'duration' => null,
            'description' => 'Documento de prueba',
            'alt_text' => 'Documento de prueba',
            'title' => 'Documento de prueba',
            'is_public' => true,
            'sort_order' => 2,
            'category_id' => 3,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'audio1.mp3',
            'file_path' => 'assets/media/audio/audio1.mp3',
            'file_type' => 'audio',
            'file_size' => 3072,
            'mime_type' => 'audio/mpeg',
            'extension' => 'mp3',
            'width' => null,
            'height' => null,
            'duration' => 180.3,
            'description' => 'Audio de prueba',
            'alt_text' => 'Audio de prueba',
            'title' => 'Audio de prueba',
            'is_public' => true,
            'sort_order' => 3,
            'category_id' => 4,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        

        DB::table('media_files')->insert([
            'file_name' => 'video2.mov',
            'file_path' => 'assets/media/video/video2.mov',
            'file_type' => 'video',
            'file_size' => 8192,
            'mime_type' => 'video/quicktime',
            'extension' => 'mov',
            'width' => 1280,
            'height' => 720,
            'duration' => 240.8,
            'description' => 'Segundo video de prueba',
            'alt_text' => 'Segundo video de prueba',
            'title' => 'Segundo video de prueba',
            'is_public' => true,
            'sort_order' => 5,
            'category_id' => 2,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'documento2.docx',
            'file_path' => 'assets/media/documentos/documento2.docx',
            'file_type' => 'document',
            'file_size' => 1536,
            'mime_type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'extension' => 'docx',
            'width' => null,
            'height' => null,
            'duration' => null,
            'description' => 'Segundo documento de prueba',
            'alt_text' => 'Segundo documento de prueba',
            'title' => 'Segundo documento de prueba',
            'is_public' => true,
            'sort_order' => 6,
            'category_id' => 3,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'audio2.wav',
            'file_path' => 'assets/media/audio/audio2.wav', 
            'file_type' => 'audio',
            'file_size' => 4096,
            'mime_type' => 'audio/wav',
            'extension' => 'wav',
            'width' => null,
            'height' => null,
            'duration' => 145.6,
            'description' => 'Segundo audio de prueba',
            'alt_text' => 'Segundo audio de prueba',
            'title' => 'Segundo audio de prueba',
            'is_public' => true,
            'sort_order' => 7,
            'category_id' => 4,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        

        DB::table('media_files')->insert([
            'file_name' => 'video3.mp4',
            'file_path' => 'assets/media/video/video3.mp4',
            'file_type' => 'video',
            'file_size' => 10240,
            'mime_type' => 'video/mp4',
            'extension' => 'mp4',
            'width' => 1920,
            'height' => 1080,
            'duration' => 180.5,
            'description' => 'Tercer video de prueba',
            'alt_text' => 'Tercer video de prueba',
            'title' => 'Tercer video de prueba',
            'is_public' => true,
            'sort_order' => 9,
            'category_id' => 2,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'documento3.pdf',
            'file_path' => 'assets/media/documentos/documento3.pdf',
            'file_type' => 'document',
            'file_size' => 2048,
            'mime_type' => 'application/pdf',
            'extension' => 'pdf',
            'width' => null,
            'height' => null,
            'duration' => null,
            'description' => 'Tercer documento de prueba',
            'alt_text' => 'Tercer documento de prueba',
            'title' => 'Tercer documento de prueba',
            'is_public' => true,
            'sort_order' => 10,
            'category_id' => 3,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'audio3.mp3',
            'file_path' => 'assets/media/audio/audio3.mp3',
            'file_type' => 'audio',
            'file_size' => 3072,
            'mime_type' => 'audio/mpeg',
            'extension' => 'mp3',
            'width' => null,
            'height' => null,
            'duration' => 195.2,
            'description' => 'Tercer audio de prueba',
            'alt_text' => 'Tercer audio de prueba',
            'title' => 'Tercer audio de prueba',
            'is_public' => true,
            'sort_order' => 11,
            'category_id' => 4,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'imagen4.png',
            'file_path' => 'assets/media/image/imagen4.png',
            'file_type' => 'image',
            'file_size' => 3584,
            'mime_type' => 'image/png',
            'extension' => 'png',
            'width' => 2560,
            'height' => 1440,
            'duration' => null,
            'description' => 'Cuarta imagen de prueba',
            'alt_text' => 'Cuarta imagen de prueba',
            'title' => 'Cuarta imagen de prueba',
            'is_public' => true,
            'sort_order' => 12,
            'category_id' => 1,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'video4.webm',
            'file_path' => 'assets/media/video/video4.webm',
            'file_type' => 'video',
            'file_size' => 12288,
            'mime_type' => 'video/webm',
            'extension' => 'webm',
            'width' => 2560,
            'height' => 1440,
            'duration' => 320.7,
            'description' => 'Cuarto video de prueba',
            'alt_text' => 'Cuarto video de prueba',
            'title' => 'Cuarto video de prueba',
            'is_public' => true,
            'sort_order' => 13,
            'category_id' => 2,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'documento4.xlsx',
            'file_path' => 'assets/media/documentos/documento4.xlsx',
            'file_type' => 'document',
            'file_size' => 1792,
            'mime_type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'extension' => 'xlsx',
            'width' => null,
            'height' => null,
            'duration' => null,
            'description' => 'Cuarto documento de prueba',
            'alt_text' => 'Cuarto documento de prueba',
            'title' => 'Cuarto documento de prueba',
            'is_public' => true,
            'sort_order' => 14,
            'category_id' => 3,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('media_files')->insert([
            'file_name' => 'audio4.ogg',
            'file_path' => 'assets/media/audio/audio4.ogg',
            'file_type' => 'audio',
            'file_size' => 2560,
            'mime_type' => 'audio/ogg',
            'extension' => 'ogg',
            'width' => null,
            'height' => null,
            'duration' => 168.3,
            'description' => 'Cuarto audio de prueba',
            'alt_text' => 'Cuarto audio de prueba',
            'title' => 'Cuarto audio de prueba',
            'is_public' => true,
            'sort_order' => 15,
            'category_id' => 4,
            'uploaded_by' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
        
    }
}
