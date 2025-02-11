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

use App\Http\Controllers\motos\clientesController;
use App\Http\Controllers\motos\TipoMotoController;
use App\Http\Controllers\motos\MotoController;
use App\Http\Controllers\motos\ModeloController;
use App\Http\Controllers\motos\CotizacionController;
use App\Http\Controllers\motos\MenuMotosController;
use App\Http\Controllers\motos\MarcaController;
use App\Http\Controllers\motos\TipoAccesorioController;
use App\Http\Controllers\motos\TipoRepuestoController;
use App\Http\Controllers\motos\AccesorioController;
use App\Http\Controllers\motos\RepuestoController;
use App\Http\Controllers\motos\FinanciacionController;
use App\Http\Controllers\motos\MotosByTipoController;
use App\Http\Controllers\motos\FormularioCotizacionController;
use App\Http\Controllers\medios\MedioCategoriaController;
use App\Http\Controllers\medios\MedioFileController;


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


// Rutas para motos

// Rutas para clientes
Route::get('clientes', [clientesController::class, 'index']);
Route::get('clientes/{id}', [clientesController::class, 'show']);
Route::post('clientes', [clientesController::class, 'store']);
Route::put('clientes/{id}', [clientesController::class, 'update']);
Route::delete('clientes/{id}', [clientesController::class, 'destroy']);

// Rutas para tipos de motos
Route::get('tipos-motos', [TipoMotoController::class, 'index']);
Route::get('tipos-motos/{id}', [TipoMotoController::class, 'show']);
Route::post('tipos-motos', [TipoMotoController::class, 'store']);
Route::put('tipos-motos/{id}', [TipoMotoController::class, 'update']);
Route::delete('tipos-motos/{id}', [TipoMotoController::class, 'destroy']);

// Rutas para motos
Route::get('motos', [MotoController::class, 'index']);
Route::get('motos/{id}', [MotoController::class, 'show']);
Route::post('motos', [MotoController::class, 'store']);
Route::post('motos/{id}', [MotoController::class, 'update']);
Route::delete('motos/{id}', [MotoController::class, 'destroy']);

// Rutas para modelos
Route::get('modelos', [ModeloController::class, 'index']);
Route::get('modelos/{id}', [ModeloController::class, 'show']);
Route::post('modelos', [ModeloController::class, 'store']);
Route::put('modelos/{id}', [ModeloController::class, 'update']);
Route::delete('modelos/{id}', [ModeloController::class, 'destroy']);

// Rutas para cotizaciones
Route::get('cotizaciones', [CotizacionController::class, 'index']);
Route::post('cotizaciones', [CotizacionController::class, 'store']);
Route::get('cotizaciones/{id}', [CotizacionController::class, 'show']);
Route::put('cotizaciones/{id}', [CotizacionController::class, 'update']);
Route::delete('cotizaciones/{id}', [CotizacionController::class, 'destroy']);

Route::get('/menu-motos', [MenuMotosController::class, 'getMenuMotos']);


// Rutas para marcas
Route::get('marcas', [MarcaController::class, 'index']);
Route::get('marcas/{id}', [MarcaController::class, 'show']);
Route::post('marcas', [MarcaController::class, 'store']);
Route::put('marcas/{id}', [MarcaController::class, 'update']);
Route::delete('marcas/{id}', [MarcaController::class, 'destroy']);

// Rutas para tipos de accesorios
Route::get('tipos-accesorios', [TipoAccesorioController::class, 'index']);
Route::get('tipos-accesorios/{id}', [TipoAccesorioController::class, 'show']);
Route::post('tipos-accesorios', [TipoAccesorioController::class, 'store']);
Route::put('tipos-accesorios/{id}', [TipoAccesorioController::class, 'update']);
Route::delete('tipos-accesorios/{id}', [TipoAccesorioController::class, 'destroy']);

// Rutas para tipos de repuestos
Route::get('tipos-repuestos', [TipoRepuestoController::class, 'index']);
Route::get('tipos-repuestos/{id}', [TipoRepuestoController::class, 'show']);
Route::post('tipos-repuestos', [TipoRepuestoController::class, 'store']);
Route::put('tipos-repuestos/{id}', [TipoRepuestoController::class, 'update']);
Route::delete('tipos-repuestos/{id}', [TipoRepuestoController::class, 'destroy']);

// Rutas para accesorios
Route::get('accesorios', [AccesorioController::class, 'index']);
Route::get('accesorios/{id}', [AccesorioController::class, 'show']);
Route::post('accesorios', [AccesorioController::class, 'store']);
Route::post('accesorios/{id}', [AccesorioController::class, 'update']);
Route::delete('accesorios/{id}', [AccesorioController::class, 'destroy']);

// Rutas para repuestos
Route::get('repuestos', [RepuestoController::class, 'index']);
Route::get('repuestos/{id}', [RepuestoController::class, 'show']);
Route::post('repuestos', [RepuestoController::class, 'store']);
Route::post('repuestos/{id}', [RepuestoController::class, 'update']);
Route::delete('repuestos/{id}', [RepuestoController::class, 'destroy']);

// Rutas para financiaciones
Route::get('financiaciones', [FinanciacionController::class, 'index']);
Route::get('financiaciones/{id}', [FinanciacionController::class, 'show']);
Route::post('financiaciones', [FinanciacionController::class, 'store']);
Route::post('financiaciones/{id}', [FinanciacionController::class, 'update']);
Route::delete('financiaciones/{id}', [FinanciacionController::class, 'destroy']);

// Rutas para motos por tipo
Route::prefix('motos-por-tipo')->group(function () {
    Route::get('/', [MotosByTipoController::class, 'index']);
    Route::get('/tipos', [MotosByTipoController::class, 'getTipos']);
    Route::get('/{tipo}', [MotosByTipoController::class, 'index']);
});

Route::post('/cotizaciones', [FormularioCotizacionController::class, 'store']);

// Rutas para categorías de archivos multimedia
Route::get('/media-categorias', [MedioCategoriaController::class, 'index']);
Route::get('/media-categorias/{id}', [MedioCategoriaController::class, 'show']);
Route::post('/media-categorias', [MedioCategoriaController::class, 'store']);
Route::put('/media-categorias/{id}', [MedioCategoriaController::class, 'update']);
Route::delete('/media-categorias/{id}', [MedioCategoriaController::class, 'destroy']);

// Rutas para archivos multimedia
Route::prefix('media')->group(function () {
    Route::get('/', [MedioFileController::class, 'index']); // Obtener todos los archivos multimedia
    Route::get('/{id}', [MedioFileController::class, 'show']); // Obtener un archivo multimedia por ID
    Route::post('/', [MedioFileController::class, 'store']); // Crear un nuevo archivo multimedia
    Route::put('/{id}', [MedioFileController::class, 'update']); // Actualizar un archivo multimedia existente
    Route::delete('/{id}', [MedioFileController::class, 'destroy']); // Eliminar un archivo multimedia
});



