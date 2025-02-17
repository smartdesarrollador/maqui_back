<?php

declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstudianteResource;
use App\Models\Estudiante;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class EstudianteController extends Controller
{
    /**
     * Muestra un listado de estudiantes.
     */
    public function index(): AnonymousResourceCollection
    {
        $estudiantes = Estudiante::with('cursos')->get();
        return EstudianteResource::collection($estudiantes);
    }

    /**
     * Almacena un nuevo estudiante.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:estudiantes,email',
        ]);

        try {
            $estudiante = Estudiante::create($validated);

            return response()->json([
                'message' => 'Estudiante creado exitosamente',
                'data' => new EstudianteResource($estudiante),
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error al crear estudiante: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al crear el estudiante',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Muestra un estudiante específico.
     */
    public function show($id): JsonResponse
    {
        try {
            $estudiante = Estudiante::with('cursos')->find($id);
            
            if (!$estudiante) {
                return response()->json([
                    'message' => 'Estudiante no encontrado',
                ], 404);
            }

            return response()->json([
                'data' => new EstudianteResource($estudiante)
            ]);
        } catch (\Exception $e) {
            Log::error('Error al mostrar estudiante: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al obtener el estudiante',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Actualiza un estudiante específico.
     *
     * @throws ValidationException
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $estudiante = Estudiante::find($id);
            
            if (!$estudiante) {
                return response()->json([
                    'message' => 'Estudiante no encontrado',
                ], 404);
            }

            $validated = $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email|unique:estudiantes,email,' . $estudiante->id,
            ]);

            $estudiante->update($validated);
            $estudiante->refresh(); // Refrescamos el modelo para obtener los datos actualizados

            return response()->json([
                'message' => 'Estudiante actualizado exitosamente',
                'data' => new EstudianteResource($estudiante->load('cursos')),
            ]);
        } catch (\Exception $e) {
            Log::error('Error al actualizar estudiante: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al actualizar el estudiante',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Elimina un estudiante específico.
     */
    public function destroy(Estudiante $estudiante): JsonResponse
    {
        try {
            $estudiante->delete();

            return response()->json([
                'message' => 'Estudiante eliminado exitosamente',
            ]);
        } catch (\Exception $e) {
            Log::error('Error al eliminar estudiante: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al eliminar el estudiante',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
