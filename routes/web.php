<?php

use Illuminate\Support\Facades\Route;

use App\Mail\TestContact;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Test\test_motos\MotosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "hola";
});

Route::get('/prueba', function () {
    return "hola";
});

// En routes/api.php o routes/web.php
Route::prefix('test-motos')->group(function () {
    Route::get('/moto-modelo-marca', [MotosController::class, 'testMotoModeloMarca']);
    Route::get('/moto-tipo', [MotosController::class, 'testMotoTipo']);
    Route::get('/moto-accesorios', [MotosController::class, 'testMotoAccesorios']);
    Route::get('/moto-repuestos', [MotosController::class, 'testMotoRepuestos']);
    Route::get('/moto-resenas', [MotosController::class, 'testMotoResenas']);
    Route::get('/moto-cotizaciones', [MotosController::class, 'testMotoCotizaciones']);
    Route::get('/marca-motos', [MotosController::class, 'testMarcaMotos']);
    Route::get('/full-moto-relations', [MotosController::class, 'testFullMotoRelations']);
});

