<?php

declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstudianteCursoResource;
use App\Models\EstudianteCurso;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class EstudianteCursoController extends Controller
{
    /**
     * Muestra un listado de inscripciones.
     */
    public function index(): AnonymousResourceCollection
    {
        $inscripciones = EstudianteCurso::with(['estudiante', 'curso'])->get();
        return EstudianteCursoResource::collection($inscripciones);
    }

    /**
     * Almacena una nueva inscripción.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_inscripcion' => 'required|date',
            'calificacion' => 'nullable|numeric|min:0|max:10',
        ]);

        try {
            // Verificar si ya existe la inscripción
            $existeInscripcion = EstudianteCurso::where([
                'estudiante_id' => $validated['estudiante_id'],
                'curso_id' => $validated['curso_id'],
            ])->exists();

            if ($existeInscripcion) {
                return response()->json([
                    'message' => 'El estudiante ya está inscrito en este curso',
                ], 422);
            }

            $inscripcion = EstudianteCurso::create($validated);

            return response()->json([
                'message' => 'Inscripción creada exitosamente',
                'data' => new EstudianteCursoResource($inscripcion->load(['estudiante', 'curso'])),
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error al crear inscripción: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al crear la inscripción',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Muestra una inscripción específica.
     */
    public function show(EstudianteCurso $inscripcion): EstudianteCursoResource
    {
        return new EstudianteCursoResource($inscripcion->load(['estudiante', 'curso']));
    }

    /**
     * Actualiza una inscripción específica.
     *
     * @throws ValidationException
     */
    public function update(Request $request, EstudianteCurso $inscripcion): JsonResponse
    {
        $validated = $request->validate([
            'fecha_inscripcion' => 'sometimes|required|date',
            'calificacion' => 'nullable|numeric|min:0|max:10',
        ]);

        try {
            $inscripcion->update($validated);

            return response()->json([
                'message' => 'Inscripción actualizada exitosamente',
                'data' => new EstudianteCursoResource($inscripcion->load(['estudiante', 'curso'])),
            ]);
        } catch (\Exception $e) {
            Log::error('Error al actualizar inscripción: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al actualizar la inscripción',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Elimina una inscripción específica.
     */
    public function destroy(EstudianteCurso $inscripcion): JsonResponse
    {
        try {
            $inscripcion->delete();

            return response()->json([
                'message' => 'Inscripción eliminada exitosamente',
            ]);
        } catch (\Exception $e) {
            Log::error('Error al eliminar inscripción: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error al eliminar la inscripción',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
