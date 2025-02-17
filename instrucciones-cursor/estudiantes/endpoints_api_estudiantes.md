/_ Crud Estudiante _/

Route::get('estudiantes', [EstudianteController::class, 'index']);
Route::get('estudiantes/{id}', [EstudianteController::class, 'show']);
Route::post('estudiantes', [EstudianteController::class, 'store']);
Route::put('estudiantes/{id}', [EstudianteController::class, 'update']);
Route::delete('estudiantes/{id}', [EstudianteController::class, 'destroy']);
