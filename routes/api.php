<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\UserController;

use App\Mail\TestContact;
use App\Http\Controllers\Test\ContactController;


use App\Http\Controllers\Test\Api\CrudController;
use App\Http\Controllers\Test\TestFileController;
use App\Http\Controllers\TestApiController;
use App\Http\Controllers\Test\TestConsultasController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MisionController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\ProductoController;
 /* 9.- ENVIO-CORREO-V1-P1  */
use App\Http\Controllers\ContactoController;
 /* /9.- ENVIO-CORREO-V1-P1  */
use App\Http\Controllers\TestimonioController;
use App\Models\Producto;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;

use App\Http\Controllers\Categoria1Controller;
use App\Http\Controllers\Tabla1Controller;

use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::apiResource('test_api', TestApiController::class);

Route::get('test/consulta1', [TestConsultasController::class, 'consulta1']);

/* crud basico */

/* Route::apiResource('test_api_crud', CrudController::class)->middleware('cors'); */

Route::get('test_api_crud', [CrudController::class, 'index']);
Route::post('test_api_crud', [CrudController::class, 'store']);
Route::put('test_api_crud/{id}', [CrudController::class, 'update']);
Route::delete('test_api_crud/{id}', [CrudController::class, 'destroy']);





/* Upload imagenes */
Route::post('file', [TestFileController::class, 'file']);

Route::get('listar/files', [FileController::class, 'index']);

Route::post('upload', [FileController::class, 'file']);

Route::post('update/upload', [FileController::class, 'updateFile']);

Route::delete('update/upload/{id}', [FileController::class, 'destroy']);


/* Upload imagenes Carousel */

Route::get('carousel/listar/files', [CarouselController::class, 'index']);

Route::post('carousel/upload', [CarouselController::class, 'file']);

Route::post('carousel/update/upload', [CarouselController::class, 'updateFile']);

Route::delete('carousel/update/upload/{id}', [CarouselController::class, 'destroy']);

/* Crud Mision */

Route::get('mision', [MisionController::class, 'index']);

Route::put('mision/actualizar/{id}', [MisionController::class, 'update']);

Route::post('mision/update/upload', [MisionController::class, 'updateFile']);


Route::post('register',[UserController::class,'register']);

Route::post('login',[UserController::class,'login']);


/* Test Envio Mail */
Route::get('contactanos',function(){
    Mail::to('prueba@iatecdigital.com')->send(new TestContact("hola"));
    return "mensaje enviado";
})->name('contactanos');

Route::post('enviar_correo',[ContactController::class,'sendContactForm']);


// Crud Productos
Route::get('productos', [ProductoController::class, 'index']);
Route::get('productos/cursos', [ProductoController::class, 'obtenerCursos']);
Route::get('productos/especialidades', [ProductoController::class, 'obtenerEspecialidades']);
Route::get('productos/destacados', [ProductoController::class, 'obtenerDestacados']);
Route::post('productos', [ProductoController::class, 'store']);
Route::get('productos/{id}', [ProductoController::class, 'show']);
Route::put('productos/{id}', [ProductoController::class, 'update']);
Route::delete('productos/{id}', [ProductoController::class, 'destroy']);
Route::post('productos/subir', [ProductoController::class, 'file']);
Route::post('productos/update', [ProductoController::class, 'updateFile']);


// Contacto
Route::get('contactos', [ContactoController::class, 'index']);
Route::get('/contactos/{id_contacto}', [ContactoController::class, 'show']);
Route::post('/contactos', [ContactoController::class, 'store']);

// Ruta para actualizar un contacto existente
Route::put('/contactos/{id_contacto}', [ContactoController::class, 'update']);

// Ruta para eliminar un contacto
Route::delete('/contactos/{id_contacto}', [ContactoController::class, 'destroy']);

/* 10.- ENVIO-CORREO-V1-P1  */
Route::post('contacto',[ContactoController::class,'sendContactForm']);
/* /10.- ENVIO-CORREO-V1-P1  */

// Crud Testimonio
Route::get('testimonios', [TestimonioController::class, 'index']);
Route::post('testimonios', [TestimonioController::class, 'store']);
Route::get('testimonios/{id}', [TestimonioController::class, 'show']);
Route::put('testimonios/{id}', [TestimonioController::class, 'update']);
Route::delete('testimonios/{id}', [TestimonioController::class, 'destroy']);
Route::post('testimonios/subir', [TestimonioController::class, 'file']);
Route::post('testimonios/update', [TestimonioController::class, 'updateFile']);


// Blog
Route::apiResource('posts', PostController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('tags', TagController::class);


Route::post('posts/update', [PostController::class, 'updateWithPost']);

Route::get('posts/category/{id}', [PostController::class, 'getPostsByCategory']);


// Rutas resource para Categoria1 y Tabla1
Route::apiResource('categoria1', Categoria1Controller::class);
Route::apiResource('tabla1', Tabla1Controller::class);

// Ruta personalizada para actualizar con POST usando updateWithPost (Categoria1)
Route::post('categoria1/{id}/updatewithpost', [Categoria1Controller::class, 'updateWithPost']);

// Ruta personalizada para actualizar con POST usando updateWithPost (Tabla1)
Route::post('tabla1/{id}/updatewithpost', [Tabla1Controller::class, 'updateWithPost']);


/* Route::get('categorias-con-registros', [Tabla1Controller::class, 'getCategoriasConRegistros']); */

Route::get('/categorias-con-registros', [Categoria1Controller::class, 'getCategoriasConRegistros']);



