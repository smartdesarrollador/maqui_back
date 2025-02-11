<?php

declare(strict_types=1);

namespace App\Http\Controllers\medios;

use App\Http\Controllers\Controller;
use App\Models\MediaFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MedioFileController extends Controller
{
    /**
     * Muestra un listado de archivos multimedia.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $query = MediaFile::with(['category', 'uploader']);

            // Búsqueda por título, descripción o nombre de archivo
            if ($request->has('search')) {
                $searchTerm = $request->search;
                $query->where(function($q) use ($searchTerm) {
                    $q->where('title', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('file_name', 'LIKE', "%{$searchTerm}%");
                });
            }

            // Filtrar por categoría
            if ($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
            }

            // Filtrar por tipo de archivo
            if ($request->has('file_type')) {
                $query->where('file_type', $request->file_type);
            }

            // Ordenamiento
            $sortField = $request->input('sort_by', 'sort_order');
            $sortDirection = $request->input('sort_direction', 'asc');
            $validSortFields = ['title', 'file_name', 'created_at', 'file_size', 'sort_order'];
            
            if (in_array($sortField, $validSortFields)) {
                $query->orderBy($sortField, $sortDirection);
            }

            // Paginación
            $perPage = $request->input('per_page', 20);
            $archivos = $query->paginate($perPage);

            return response()->json([
                'status' => 'success',
                'data' => $archivos,
                'meta' => [
                    'current_page' => $archivos->currentPage(),
                    'last_page' => $archivos->lastPage(),
                    'per_page' => $archivos->perPage(),
                    'total' => $archivos->total()
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error al obtener archivos multimedia: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener los archivos'
            ], 500);
        }
    }

    /**
     * Almacena un nuevo archivo multimedia.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'file' => 'required|file|max:10240', // máximo 10MB
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'alt_text' => 'nullable|string',
                'is_public' => 'boolean',
                'sort_order' => 'nullable|integer',
                'category_id' => 'nullable|exists:media_categories,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::uuid() . '.' . $extension;
            $mimeType = $file->getMimeType();
            $fileSize = $file->getSize();

            // Determinar el tipo de archivo basado en el mime type
            $fileType = Str::before($mimeType, '/');

            // Obtener dimensiones si es una imagen
            $width = null;
            $height = null;
            if ($fileType === 'image') {
                list($width, $height) = getimagesize($file->path());
            }

            // Guardar el archivo
            $path = $file->storeAs('media/' . $fileType, $fileName, 'public');

            $mediaFile = MediaFile::create([
                'file_name' => $fileName,
                'file_path' => $path,
                'file_type' => $fileType,
                'file_size' => $fileSize,
                'mime_type' => $mimeType,
                'extension' => $extension,
                'width' => $width,
                'height' => $height,
                'title' => $request->title,
                'description' => $request->description,
                'alt_text' => $request->alt_text,
                'is_public' => $request->is_public ?? true,
                'sort_order' => $request->sort_order ?? 0,
                'category_id' => $request->category_id,
                'uploaded_by' => auth()->id()
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Archivo subido exitosamente',
                'data' => $mediaFile
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al subir archivo multimedia: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al subir el archivo'
            ], 500);
        }
    }

    /**
     * Muestra un archivo multimedia específico.
     */
    public function show(int $id): JsonResponse
    {
        try {
            $archivo = MediaFile::with(['category', 'uploader'])
                ->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $archivo
            ]);
        } catch (\Exception $e) {
            Log::error('Error al obtener archivo multimedia: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Archivo no encontrado'
            ], 404);
        }
    }

    /**
     * Actualiza un archivo multimedia específico.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $mediaFile = MediaFile::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'file' => 'nullable|file|max:10240',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'alt_text' => 'nullable|string',
                'is_public' => 'boolean',
                'sort_order' => 'nullable|integer',
                'category_id' => 'nullable|exists:media_categories,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            // Si se proporciona un nuevo archivo
            if ($request->hasFile('file')) {
                // Eliminar archivo anterior
                Storage::disk('public')->delete($mediaFile->file_path);

                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $fileName = Str::uuid() . '.' . $extension;
                $mimeType = $file->getMimeType();
                $fileSize = $file->getSize();
                $fileType = Str::before($mimeType, '/');

                // Obtener dimensiones si es una imagen
                $width = null;
                $height = null;
                if ($fileType === 'image') {
                    list($width, $height) = getimagesize($file->path());
                }

                // Guardar nuevo archivo
                $path = $file->storeAs('media/' . $fileType, $fileName, 'public');

                // Actualizar información del archivo
                $mediaFile->file_name = $fileName;
                $mediaFile->file_path = $path;
                $mediaFile->file_type = $fileType;
                $mediaFile->file_size = $fileSize;
                $mediaFile->mime_type = $mimeType;
                $mediaFile->extension = $extension;
                $mediaFile->width = $width;
                $mediaFile->height = $height;
            }

            // Actualizar metadatos
            $mediaFile->title = $request->title;
            $mediaFile->description = $request->description;
            $mediaFile->alt_text = $request->alt_text;
            $mediaFile->is_public = $request->is_public ?? $mediaFile->is_public;
            $mediaFile->sort_order = $request->sort_order ?? $mediaFile->sort_order;
            $mediaFile->category_id = $request->category_id;

            $mediaFile->save();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Archivo actualizado exitosamente',
                'data' => $mediaFile
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar archivo multimedia: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualizar el archivo'
            ], 500);
        }
    }

    /**
     * Elimina un archivo multimedia específico.
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $mediaFile = MediaFile::findOrFail($id);

            DB::beginTransaction();

            // Eliminar el archivo físico
            Storage::disk('public')->delete($mediaFile->file_path);
            
            // Eliminar el registro
            $mediaFile->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Archivo eliminado exitosamente'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al eliminar archivo multimedia: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar el archivo'
            ], 500);
        }
    }
}
