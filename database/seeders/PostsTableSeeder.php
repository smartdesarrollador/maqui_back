<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $contenido = '<h2><strong>Lorem Ipsum Title:</strong></h2><p><br></p><h2>Lorem Ipsum Dolor Sit Amet: Lorem Ipsum Lorem</h2><p><br></p><h2><strong>Lorem Ipsum Subheader:</strong></h2><h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit lorem ipsum dolor sit.</h2><p><br></p><h2><strong>Lorem Ipsum Paragraph 1:</strong></h2><h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non felis non nulla aliquet fermentum vel at enim. Nulla facilisi. Nam dictum, turpis et convallis convallis, eros lectus luctus magna, ac accumsan risus eros ut eros. Proin in ligula a metus pulvinar elementum. Aenean ut velit id urna vulputate cursus sit amet id arcu. Suspendisse viverra interdum odio, eget feugiat nulla facilisis a.</h2><p><br></p><h2><strong>Lorem Ipsum Paragraph 2:</strong></h2><h2>Mauris auctor leo ut ligula malesuada, a tincidunt magna laoreet. Fusce bibendum felis non ligula convallis, non fermentum risus viverra. Cras auctor convallis tortor, nec fermentum magna pellentesque et. Nulla facilisi. Aliquam erat volutpat. Donec scelerisque, ligula eget feugiat laoreet, elit ex tristique velit, id tempus magna ligula non lectus.</h2><p><br></p><h2><strong>Lorem Ipsum Features:</strong></h2><ol><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong class="ql-size-large">Lorem Ipsum Feature 1</strong><span class="ql-size-large">: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</span></li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong class="ql-size-large">Lorem Ipsum Feature 2</strong><span class="ql-size-large">: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</span></li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong class="ql-size-large">Lorem Ipsum Feature 3</strong><span class="ql-size-large">: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur blandit tempus porttitor.</span></li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span><strong class="ql-size-large">Lorem Ipsum Feature 4</strong><span class="ql-size-large">: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</span></li></ol><p><br></p><h2><strong>Lorem Ipsum Numbered List – Lorem Ipsum Steps:</strong></h2><ol><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span><strong class="ql-size-large">Lorem Ipsum Step 1</strong><span class="ql-size-large">: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</span></li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span><strong class="ql-size-large">Lorem Ipsum Step 2</strong><span class="ql-size-large">: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam porta sem malesuada magna mollis euismod.</span></li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span><strong class="ql-size-large">Lorem Ipsum Step 3</strong><span class="ql-size-large">: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</span></li><li data-list="ordered"><span class="ql-ui" contenteditable="false"></span><strong class="ql-size-large">Lorem Ipsum Step 4</strong><span class="ql-size-large">: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia bibendum nulla sed consectetur.</span></li></ol><p><br></p>';

        DB::table('posts')->insert([
            [
    'titulo' => 'Primer Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 1,
    'estado' => 'publicado',
    'imagen' => "imagen1.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen1.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Segundo Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 2,
    'estado' => 'publicado',
    'imagen' => "imagen2.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen2.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Tercer Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 1,
    'estado' => 'borrador',
    'imagen' => "imagen3.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen3.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Cuarto Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 3,
    'estado' => 'publicado',
    'imagen' => "imagen4.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen4.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Quinto Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 2,
    'estado' => 'borrador',
    'imagen' => "imagen5.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen5.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Sexto Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 1,
    'estado' => 'publicado',
    'imagen' => "imagen6.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen6.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Séptimo Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 2,
    'estado' => 'publicado',
    'imagen' => "imagen7.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen7.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Octavo Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 3,
    'estado' => 'borrador',
    'imagen' => "imagen8.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen8.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Noveno Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 1,
    'estado' => 'publicado',
    'imagen' => "imagen9.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen9.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Décimo Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 2,
    'estado' => 'borrador',
    'imagen' => "imagen10.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen10.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Onceavo Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 3,
    'estado' => 'publicado',
    'imagen' => "imagen11.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen11.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Doceavo Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 1,
    'estado' => 'borrador',
    'imagen' => "imagen12.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen12.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Treceavo Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 2,
    'estado' => 'publicado',
    'imagen' => "imagen13.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen13.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Catorceavo Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 3,
    'estado' => 'borrador',
    'imagen' => "imagen14.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen14.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'titulo' => 'Quinceavo Titulo del Post',
    'contenido' => $contenido,
    'id_autor' => 1,
    'estado' => 'publicado',
    'imagen' => "imagen15.jpg",
    'ruta_imagen' => "assets/imagen/post/imagen15.jpg",
    'fecha_publicacion' => now(),
    'created_at' => now(),
    'updated_at' => now(),
],

        ]);
    }
}
