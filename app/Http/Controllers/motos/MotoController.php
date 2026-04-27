<?php

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MotoController extends Controller
{
    /**
     * Obtener listado de motos con paginación
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            // Validar parámetros de paginación y ordenamiento
            $validator = Validator::make($request->all(), [
                'per_page' => 'integer|min:1|max:100',
                'page' => 'integer|min:1',
                'order_by' => 'string|in:año,precio_base,created_at',
                'order_direction' => 'string|in:asc,desc'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }

            // Construir la consulta base
            $query = Moto::with(['modelo.marca', 'tipoMoto']);

            // Aplicar búsqueda si existe término
            if ($request->has('search')) {
                $searchTerm = $request->search;
                $query->where(function($q) use ($searchTerm) {
                    $q->where('color', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('descripcion', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('cilindrada', 'LIKE', "%{$searchTerm}%")
                      ->orWhere('motor', 'LIKE', "%{$searchTerm}%")
                      ->orWhereHas('modelo', function($q) use ($searchTerm) {
                          $q->where('nombre', 'LIKE', "%{$searchTerm}%");
                      })
                      ->orWhereHas('modelo.marca', function($q) use ($searchTerm) {
                          $q->where('nombre', 'LIKE', "%{$searchTerm}%");
                      });
                });
            }

            // Aplicar filtros adicionales
            if ($request->has('año')) {
                $query->where('año', $request->año);
            }

            if ($request->has('precio_min')) {
                $query->where('precio_base', '>=', $request->precio_min);
            }

            if ($request->has('precio_max')) {
                $query->where('precio_base', '<=', $request->precio_max);
            }

            if ($request->has('tipo_moto_id')) {
                $query->where('tipo_moto_id', $request->tipo_moto_id);
            }

            // Aplicar ordenamiento
            $orderBy = $request->get('order_by', 'created_at');
            $orderDirection = $request->get('order_direction', 'desc');
            $query->orderBy($orderBy, $orderDirection);

            // Ejecutar paginación
            $motos = $query->paginate($request->get('per_page', 10));

            return response()->json($motos, 200);

        } catch (\Exception $e) {
            Log::error('Error al obtener motos: ' . $e->getMessage());
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Almacenar una nueva moto
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            Log::info('Recibiendo request para crear moto:', $request->all());
            
            $validator = Validator::make($request->all(), [
                'modelo_id' => 'required|exists:modelos,id_modelo|unique:motos,modelo_id',
                'año' => 'required|integer|min:1900',
                'precio_base' => 'required|numeric|min:0',
                'color' => 'required|string|max:255',
                'stock' => 'required|integer|min:0',
                'descripcion' => 'required|string',
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cilindrada' => 'required|string|max:255',
                'motor' => 'required|string|max:255',
                'potencia' => 'required|string|max:255',
                'arranque' => 'required|string|max:255',
                'transmision' => 'required|string|max:255',
                'capacidad_tanque' => 'required|regex:/^\d*\.?\d+$/|max:255',
                'peso_neto' => 'required|numeric|min:0',
                'carga_util' => 'required|numeric|min:0',
                'peso_bruto' => 'required|numeric|min:0',
                'largo' => 'required|numeric|min:0',
                'ancho' => 'required|numeric|min:0',
                'alto' => 'required|numeric|min:0',
                'neumatico_delantero' => 'required|string|max:255',
                'neumatico_posterior' => 'required|string|max:255',
                'freno_delantero' => 'required|string|max:255',
                'freno_posterior' => 'required|string|max:255',
                'cargador_usb' => 'boolean',
                'luz_led' => 'boolean',
                'alarma' => 'boolean',
                'bluetooth' => 'boolean',
                'colores_adicionales' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                Log::error('Validación fallida:', $validator->errors()->toArray());
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Derivar tipo_moto_id desde el modelo seleccionado
            $modelo = Modelo::findOrFail($request->modelo_id);

            // Asegurarse de que los campos booleanos se conviertan a 0 o 1
            $data = $request->all();
            $data['tipo_moto_id'] = $modelo->tipo_moto_id;
            $booleanFields = ['cargador_usb', 'luz_led', 'alarma', 'bluetooth'];
            foreach ($booleanFields as $field) {
                $data[$field] = isset($data[$field]) && $data[$field] ? 1 : 0;
            }

            DB::beginTransaction();
            
            // Procesar la imagen principal
            if ($request->hasFile('imagen')) {
                Log::info('Procesando imagen principal:', [
                    'nombre_original' => $request->file('imagen')->getClientOriginalName(),
                    'mime_type' => $request->file('imagen')->getMimeType(),
                    'tamaño' => $request->file('imagen')->getSize()
                ]);
                $image = $request->file('imagen');
                $imageName = time() . '_' . $image->getClientOriginalName();

                $path = config('myconfig.url_upload_motos');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $image->move($path, $imageName);
                $data['imagen'] = 'assets/imagen/motos/' . $imageName;
            } else {
                Log::error('No se encontró archivo de imagen en la request');
            }
            
            // Crear la moto
            $moto = Moto::create($data);
            
            // Procesar colores adicionales si existen
            if ($request->has('colores_adicionales') && !empty($request->colores_adicionales)) {
                $coloresAdicionales = json_decode($request->colores_adicionales, true);
                Log::info('Procesando colores adicionales:', $coloresAdicionales);
                
                if (is_array($coloresAdicionales)) {
                    foreach ($coloresAdicionales as $colorData) {
                        $fileIndex = $colorData['fileIndex'];
                        $colorName = $colorData['color'];
                        $fileKey = "color_imagen_{$fileIndex}";
                        
                        if ($request->hasFile($fileKey)) {
                            $colorImage = $request->file($fileKey);
                            $colorImageName = time() . '_color_' . $fileIndex . '_' . $colorImage->getClientOriginalName();

                            $colorPath = config('myconfig.url_upload_motos_colores');
                            if (!file_exists($colorPath)) {
                                mkdir($colorPath, 0777, true);
                            }

                            $colorImage->move($colorPath, $colorImageName);

                            DB::table('moto_colores')->insert([
                                'modelo_id' => $data['modelo_id'],
                                'color' => $colorName,
                                'imagen_color' => 'assets/imagen/motos/colores/' . $colorImageName,
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
                            
                            Log::info("Color adicional '{$colorName}' guardado con éxito");
                        } else {
                            Log::warning("No se encontró imagen para el color '{$colorName}' con índice {$fileIndex}");
                        }
                    }
                } else {
                    Log::warning('El formato de colores_adicionales no es válido');
                }
            }
            
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Moto creada exitosamente',
                'data' => $moto
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al crear moto:', [
                'mensaje' => $e->getMessage(),
                'linea' => $e->getLine(),
                'archivo' => $e->getFile()
            ]);
            
            return response()->json([
                'status' => false,
                'message' => 'Error al crear la moto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener una moto específica
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $moto = Moto::with([
                'modelo.marca', 
                'tipoMoto',
                'accesorios',
                'repuestos'
            ])->findOrFail($id);

            return response()->json([
                'status' => true,
                'message' => 'Moto obtenida exitosamente',
                'data' => $moto
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error al obtener moto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener la moto',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Actualizar una moto específica
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            Log::info('Recibiendo request para actualizar moto:', $request->all());

            $validator = Validator::make($request->all(), [
                'modelo_id' => 'exists:modelos,id_modelo',
                'año' => 'integer',
                'precio_base' => 'numeric',
                'color' => 'string',
                'stock' => 'integer',
                'descripcion' => 'string',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cilindrada' => 'string',
                'motor' => 'string',
                'potencia' => 'string',
                'arranque' => 'string',
                'transmision' => 'string',
                'capacidad_tanque' => 'regex:/^\d*\.?\d+$/',
                'peso_neto' => 'numeric',
                'carga_util' => 'numeric',
                'peso_bruto' => 'numeric',
                'largo' => 'numeric',
                'ancho' => 'numeric',
                'alto' => 'numeric',
                'neumatico_delantero' => 'string',
                'neumatico_posterior' => 'string',
                'freno_delantero' => 'string',
                'freno_posterior' => 'string',
                'cargador_usb' => 'boolean',
                'luz_led' => 'boolean',
                'alarma' => 'boolean',
                'bluetooth' => 'boolean',
                'colores' => 'nullable|string',
                'colores_eliminados' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                Log::error('Validación fallida:', $validator->errors()->toArray());
                return response()->json([
                    'status' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $moto = Moto::findOrFail($id);
            $data = $request->all();

            // Si cambia el modelo, derivar tipo_moto_id del nuevo modelo
            if ($request->has('modelo_id')) {
                $modelo = Modelo::findOrFail($request->modelo_id);
                $data['tipo_moto_id'] = $modelo->tipo_moto_id;
            }

            // Convertir campos booleanos
            $booleanFields = ['cargador_usb', 'luz_led', 'alarma', 'bluetooth'];
            foreach ($booleanFields as $field) {
                if (isset($data[$field])) {
                    $data[$field] = filter_var($data[$field], FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
                }
            }

            // Procesar la imagen si se proporciona una nueva
            if ($request->hasFile('imagen')) {
                Log::info('Procesando nueva imagen principal:', [
                    'nombre_original' => $request->file('imagen')->getClientOriginalName(),
                    'mime_type' => $request->file('imagen')->getMimeType(),
                    'tamaño' => $request->file('imagen')->getSize()
                ]);

                $image = $request->file('imagen');
                $imageName = time() . '_' . $image->getClientOriginalName();

                $path = config('myconfig.url_upload_motos');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                if ($moto->imagen && file_exists($path . '/' . basename($moto->imagen))) {
                    unlink($path . '/' . basename($moto->imagen));
                }

                $image->move($path, $imageName);
                
                // Actualizar la ruta de la imagen en los datos
                $data['imagen'] = 'assets/imagen/motos/' . $imageName;
            }

            // Procesar colores si se proporcionan
            if ($request->has('colores') && $request->colores) {
                $colores = json_decode($request->colores, true);
                Log::info('Procesando colores:', $colores);

                if (is_array($colores)) {
                    foreach ($colores as $colorData) {
                        $fileIndex = $colorData['fileIndex'];
                        $colorName = $colorData['color'];
                        $fileKey = "color_imagen_{$fileIndex}";
                        $isNew = $colorData['isNew'];
                        $colorId = $colorData['id_moto_color'];

                        // Si es un color nuevo o se está actualizando la imagen
                        if ($request->hasFile($fileKey)) {
                            $colorImage = $request->file($fileKey);
                            $colorImageName = time() . '_color_' . $fileIndex . '_' . $colorImage->getClientOriginalName();

                            $colorPath = config('myconfig.url_upload_motos_colores');
                            if (!file_exists($colorPath)) {
                                mkdir($colorPath, 0777, true);
                            }

                            $colorImage->move($colorPath, $colorImageName);
                            $imagenColor = 'assets/imagen/motos/colores/' . $colorImageName;
                            
                            // Si es un nuevo color, crear un nuevo registro
                            if ($isNew) {
                                DB::table('moto_colores')->insert([
                                    'modelo_id' => $data['modelo_id'],
                                    'color' => $colorName,
                                    'imagen_color' => $imagenColor,
                                    'created_at' => now(),
                                    'updated_at' => now()
                                ]);
                                Log::info("Nuevo color '{$colorName}' agregado");
                            } 
                            // Si es un color existente, actualizar el registro
                            else {
                                DB::table('moto_colores')
                                    ->where('id_moto_color', $colorId)
                                    ->update([
                                        'color' => $colorName,
                                        'imagen_color' => $imagenColor,
                                        'updated_at' => now()
                                    ]);
                                Log::info("Color existente '{$colorName}' actualizado con nueva imagen");
                            }
                        }
                        // Si no hay nueva imagen pero es un color existente, solo actualizar el nombre
                        else if (!$isNew && $colorId) {
                            DB::table('moto_colores')
                                ->where('id_moto_color', $colorId)
                                ->update([
                                    'color' => $colorName,
                                    'updated_at' => now()
                                ]);
                            Log::info("Color existente '{$colorName}' actualizado");
                        }
                    }
                }
            }

            // Procesar colores eliminados si se proporcionan
            if ($request->has('colores_eliminados') && $request->colores_eliminados) {
                $coloresEliminados = json_decode($request->colores_eliminados, true);
                Log::info('Procesando colores eliminados:', $coloresEliminados);

                if (is_array($coloresEliminados) && count($coloresEliminados) > 0) {
                    // Primero obtenemos las imágenes para eliminarlas del sistema de archivos
                    $coloresToDelete = DB::table('moto_colores')
                        ->whereIn('id_moto_color', $coloresEliminados)
                        ->get();
                    
                    foreach ($coloresToDelete as $color) {
                        // Eliminar la imagen si existe
                        if ($color->imagen_color && file_exists(public_path($color->imagen_color))) {
                            unlink(public_path($color->imagen_color));
                        }
                    }

                    // Eliminar los registros de la base de datos
                    DB::table('moto_colores')
                        ->whereIn('id_moto_color', $coloresEliminados)
                        ->delete();
                    
                    Log::info('Colores eliminados correctamente');
                }
            }

            // Actualizar la moto con los datos restantes
            $moto->update($data);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Moto actualizada exitosamente',
                'data' => $moto
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al actualizar moto:', [
                'mensaje' => $e->getMessage(),
                'linea' => $e->getLine(),
                'archivo' => $e->getFile()
            ]);
            
            return response()->json([
                'status' => false,
                'message' => 'Error al actualizar la moto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar una moto específica
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $moto = Moto::findOrFail($id);
            $moto->delete();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Moto eliminada exitosamente'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al eliminar moto: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Error al eliminar la moto',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
