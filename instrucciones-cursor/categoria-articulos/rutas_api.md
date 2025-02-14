Route::get('categoria_articulos', [CategoriaArticuloController::class, 'index']);
Route::get('categoria_articulos/{id}', [CategoriaArticuloController::class, 'show']);
Route::post('categoria_articulos', [CategoriaArticuloController::class, 'store']);
Route::put('categoria_articulos/{id}', [CategoriaArticuloController::class, 'update']);
Route::delete('categoria_articulos/{id}', [CategoriaArticuloController::class, 'destroy']);
