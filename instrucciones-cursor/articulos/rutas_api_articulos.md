Route::get('articulos', [ArticuloController::class, 'index']);
Route::get('articulos/{id}', [ArticuloController::class, 'show']);
Route::post('articulos', [ArticuloController::class, 'store']);
Route::put('articulos/{id}', [ArticuloController::class, 'update']);
Route::delete('articulos/{id}', [ArticuloController::class, 'destroy']);
