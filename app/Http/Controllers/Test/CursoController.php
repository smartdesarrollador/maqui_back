<?php

declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Resources\CursoResource;
use App\Models\Curso;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CursoController extends Controller
{
    /**
     * Muestra un listado de cursos.
     */
    public function index(): AnonymousResourceCollection
    {
        $cursos = Curso::with('estudiantes')->get();
        return CursoResource::collection($cursos);
    }

    /**
     * Almacena un nuevo curso.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        try {
            $curso = Curso::create($validated);

            return response()->json([
                'message' => 'Curso creado exitosamente',
                'data' => new CursoResource($curso),
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error al crear curso: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al crear el curso',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Muestra un curso específico.
     */
    public function show(Curso $curso): CursoResource
    {
        return new CursoResource($curso->load('estudiantes'));
    }

    /**
     * Actualiza un curso específico.
     *
     * @throws ValidationException
     */
    public function update(Request $request, Curso $curso): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'sometimes|required|numeric|min:0',
        ]);

        try {
            $curso->update($validated);

            return response()->json([
                'message' => 'Curso actualizado exitosamente',
                'data' => new CursoResource($curso),
            ]);
        } catch (\Exception $e) {
            Log::error('Error al actualizar curso: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al actualizar el curso',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Elimina un curso específico.
     */
    public function destroy(Curso $curso): JsonResponse
    {
        try {
            $curso->delete();

            return response()->json([
                'message' => 'Curso eliminado exitosamente',
            ]);
        } catch (\Exception $e) {
            Log::error('Error al eliminar curso: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al eliminar el curso',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
