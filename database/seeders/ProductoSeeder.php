<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horaActual = Carbon::now();

        $descripcion = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed eros et elit sodales laoreet. Sed vel nibh sit amet mauris bibendum semper. Nullam ac nunc ut nunc eleifend ultrices. Morbi non nibh ac neque consectetur laoreet. Sed faucibus lectus quam, a vulputate ligula ullamcorper ac. Sed nec odio a leo hendrerit varius. Mauris vel orci at ipsum ultricies laoreet. Sed eget lectus at lectus laoreet lobortis.</p><p>&nbsp;</p><p><strong>Lorem Ipsum Dolor Sit Amet</strong></p><p>&nbsp;</p><p><strong>Pre-requisitos:</strong></p><p>&nbsp;</p><ul><li>Conocimientos de manejo de datos y/o excel básico.</li><li>&nbsp;</li></ul><p><strong>Objetivo General:</strong></p><p>&nbsp;</p><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li>&nbsp;</li></ul><p><strong>Objetivos Específicos:</strong></p><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li>&nbsp;</li></ul><p><strong>Resumen del contenido:</strong></p><ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li><li>&nbsp;</li></ul><p><strong>Please note:</strong></p><ul><li>I have replaced all specific text with generic Lorem ipsum text.</li><li>I have kept the headings and subheadings the same.</li><li>I have kept the bullet points and list structure the same.</li></ul><p>I hope this is helpful! Let me know if you have any other questions.</p>";

        DB::table('productos')->insert([
            'nombre' => "ANALITICA DIGITAL",
            'resumen' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed eros et elit sodales laoreet. Sed vel nibh sit amet mauris bibendum semper. Nullam ac nunc ut nunc eleifend ultrices. Morbi non nibh ac neque consectetur laoreet.",
            'descripcion' => $descripcion,
            'duracion' => "4 Meses",
            'imagen' => "producto1.jpg",
            'ruta_imagen' => "assets/imagen/producto/producto1.jpg",
            'pdf' => "pdf_1.pdf",
            'ruta_pdf' => "assets/pdf/producto/pdf_1.pdf",
            /* 'maestro' => "maestro1", */
            'observacion' => "Ing. John Smith",
            'precio' => "900",
            'destacado' => "false",
            'categoria_producto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('productos')->insert([
            'nombre' => "MARKETING DIGITAL",
            'resumen' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed eros et elit sodales laoreet. Sed vel nibh sit amet mauris bibendum semper. Nullam ac nunc ut nunc eleifend ultrices. Morbi non nibh ac neque consectetur laoreet.",
            'descripcion' => $descripcion,
            'duracion' => "3 Meses",
            'imagen' => "producto2.jpg",
            'ruta_imagen' => "assets/imagen/producto/producto2.jpg",
            'pdf' => "pdf_2.pdf",
            'ruta_pdf' => "assets/pdf/producto/pdf_2.pdf",
            /* 'maestro' => "maestro2", */
            'observacion' => "Ing. Emily Johnson",
            'precio' => "800",
            'destacado' => "false",
            'categoria_producto_id' => 1,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('productos')->insert([
            'nombre' => "POWER BI ADVANCED",
            'resumen' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed eros et elit sodales laoreet. Sed vel nibh sit amet mauris bibendum semper. Nullam ac nunc ut nunc eleifend ultrices. Morbi non nibh ac neque consectetur laoreet.",
            'descripcion' => $descripcion,
            'duracion' => "1 año",
            'imagen' => "producto3.jpg",
            'ruta_imagen' => "assets/imagen/producto/producto3.jpg",
            'pdf' => "pdf_3.pdf",
            'ruta_pdf' => "assets/pdf/producto/pdf_3.pdf",
            /* 'maestro' => "maestro1", */
            'observacion' => "Ing. Michael Brown",
            'precio' => "1700",
            'destacado' => "false",
            'categoria_producto_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);

        DB::table('productos')->insert([
            'nombre' => "PYTHON FOR WEB SCRAPING",
            'resumen' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed eros et elit sodales laoreet. Sed vel nibh sit amet mauris bibendum semper. Nullam ac nunc ut nunc eleifend ultrices. Morbi non nibh ac neque consectetur laoreet.",
            'descripcion' => $descripcion,
            'duracion' => "1 año",
            'imagen' => "producto4.jpg",
            'ruta_imagen' => "assets/imagen/producto/producto4.jpg",
            'pdf' => "pdf_4.pdf",
            'ruta_pdf' => "assets/pdf/producto/pdf_4.pdf",
            /* 'maestro' => "maestro2", */
            'observacion' => "Ing. Sophia Williams",
            'precio' => "1900",
            'destacado' => "false",
            'categoria_producto_id' => 2,
            'created_at' => $horaActual,
            'updated_at' => $horaActual,
        ]);
    }
}
