<?php

declare(strict_types=1);

namespace App\Http\Controllers\motos;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\TipoMoto;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ComparadorModelosMotosController extends Controller
{
    /**
     * Obtiene todos los modelos de motos disponibles para comparar
     * 
     * @return JsonResponse
     */
    public function obtenerModelosDisponibles(): JsonResponse
    {
        try {
            $modelos = Modelo::with('marca')
                ->whereHas('motos', function ($query) {
                    $query->where('stock', '>', 0);
                })
                ->orderBy('marca_id')
                ->orderBy('nombre')
                ->get()
                ->map(function ($modelo) {
                    return [
                        'id' => $modelo->id_modelo,
                        'nombre' => $modelo->nombre,
                        'marca' => $modelo->marca->nombre ?? 'Sin marca',
                        'cilindrada' => $modelo->cilindrada,
                        'imagen' => $modelo->imagen ?? '',
                        'nombre_completo' => ($modelo->marca->nombre ?? '') . ' ' . $modelo->nombre
                    ];
                });
            
            return response()->json([
                'status' => 'success',
                'modelos' => $modelos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener los modelos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Compara hasta 3 modelos de motos
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function compararModelos(Request $request): JsonResponse
    {
        try {
            // Validación de modelos
            $request->validate([
                'modelos' => 'required|array|min:1|max:3',
                'modelos.*' => 'required|integer|exists:modelos,id_modelo'
            ]);

            $modelosIds = $request->input('modelos');
            
            // Obtener información detallada de las motos seleccionadas
            $motos = Moto::with(['modelo.marca', 'tipoMoto'])
                ->whereIn('modelo_id', $modelosIds)
                ->whereIn('id_moto', function($query) {
                    $query->selectRaw('MIN(id_moto)')
                        ->from('motos')
                        ->groupBy('modelo_id');
                })
                ->get();

            if ($motos->count() === 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se encontraron motos con los modelos proporcionados'
                ], 404);
            }

            // Preparar datos de comparación
            $datosComparacion = [
                'modelos' => [],
                'caracteristicas' => [
                    'colores' => [],
                    'motor_suspension' => [
                        'motor' => [],
                        'cilindrada' => [],
                        'potencia' => [],
                        'arranque' => [],
                        'transmision' => [],
                        'capacidad_tanque' => [],
                        'suspension_delantera' => [],
                        'suspension_posterior' => []
                    ],
                    'bateria_rendimiento' => [
                        'potencia_bateria' => [],
                        'tipo_bateria' => [],
                        'bateria_extraible' => [],
                        'vida_util_bateria' => [],
                        'tipo_tomacorriente' => [],
                        'tiempo_carga' => []
                    ],
                    'dimensiones_peso' => [
                        'peso_neto' => [],
                        'carga_util' => [],
                        'peso_bruto' => [],
                        'largo' => [],
                        'ancho' => [],
                        'alto' => []
                    ],
                    'llantas_frenos' => [
                        'neumatico_delantero' => [],
                        'neumatico_posterior' => [],
                        'freno_delantero' => [],
                        'freno_posterior' => []
                    ],
                    'adicionales' => [
                        'cargador_usb' => [],
                        'luz_led' => [],
                        'alarma' => [],
                        'cajuela' => [],
                        'tablero_led' => [],
                        'mp3' => [],
                        'bluetooth' => []
                    ]
                ]
            ];

            foreach ($motos as $index => $moto) {
                $nombreCompleto = ($moto->modelo->marca->nombre ?? '') . ' ' . ($moto->modelo->nombre ?? '');
                
                $datosComparacion['modelos'][] = [
                    'id' => $moto->id_moto,
                    'numero' => $index + 1,
                    'nombre' => $moto->modelo->nombre ?? 'Sin nombre',
                    'marca' => $moto->modelo->marca->nombre ?? 'Sin marca',
                    'nombre_completo' => $nombreCompleto,
                    'imagen' => $moto->imagen ?? '',
                    'precio_base' => $moto->precio_base
                ];

                // Colores
                $datosComparacion['caracteristicas']['colores'][$index] = $moto->color ?? 'No especificado';
                
                // Motor y suspensión
                $datosComparacion['caracteristicas']['motor_suspension']['motor'][$index] = $moto->motor ?? 'No especificado';
                $datosComparacion['caracteristicas']['motor_suspension']['cilindrada'][$index] = $moto->cilindrada ? "{$moto->cilindrada} cc" : 'No especificado';
                $datosComparacion['caracteristicas']['motor_suspension']['potencia'][$index] = $moto->potencia ?? 'No especificado';
                $datosComparacion['caracteristicas']['motor_suspension']['arranque'][$index] = $moto->arranque ?? 'No especificado';
                $datosComparacion['caracteristicas']['motor_suspension']['transmision'][$index] = $moto->transmision ?? 'No especificado';
                $datosComparacion['caracteristicas']['motor_suspension']['capacidad_tanque'][$index] = $moto->capacidad_tanque ? "{$moto->capacidad_tanque}L" : 'No especificado';
                $datosComparacion['caracteristicas']['motor_suspension']['suspension_delantera'][$index] = 'Telescópica'; // Valor por defecto ya que no está en el modelo
                $datosComparacion['caracteristicas']['motor_suspension']['suspension_posterior'][$index] = 'Mono shock'; // Valor por defecto
                
                // Batería y rendimiento (todas las motos mostradas son a combustión)
                $datosComparacion['caracteristicas']['bateria_rendimiento']['potencia_bateria'][$index] = 'No tiene';
                $datosComparacion['caracteristicas']['bateria_rendimiento']['tipo_bateria'][$index] = 'No tiene';
                $datosComparacion['caracteristicas']['bateria_rendimiento']['bateria_extraible'][$index] = 'No tiene';
                $datosComparacion['caracteristicas']['bateria_rendimiento']['vida_util_bateria'][$index] = 'No tiene';
                $datosComparacion['caracteristicas']['bateria_rendimiento']['tipo_tomacorriente'][$index] = 'No tiene';
                $datosComparacion['caracteristicas']['bateria_rendimiento']['tiempo_carga'][$index] = 'No tiene';
                
                // Dimensiones y peso
                $datosComparacion['caracteristicas']['dimensiones_peso']['peso_neto'][$index] = $moto->peso_neto ? "{$moto->peso_neto} kg" : 'No especificado';
                $datosComparacion['caracteristicas']['dimensiones_peso']['carga_util'][$index] = $moto->carga_util ? "{$moto->carga_util} kg" : 'No especificado';
                $datosComparacion['caracteristicas']['dimensiones_peso']['peso_bruto'][$index] = $moto->peso_bruto ? "{$moto->peso_bruto} kg" : 'No especificado';
                $datosComparacion['caracteristicas']['dimensiones_peso']['largo'][$index] = $moto->largo ? "{$moto->largo} cm" : 'No especificado';
                $datosComparacion['caracteristicas']['dimensiones_peso']['ancho'][$index] = $moto->ancho ? "{$moto->ancho} cm" : 'No especificado';
                $datosComparacion['caracteristicas']['dimensiones_peso']['alto'][$index] = $moto->alto ? "{$moto->alto} cm" : 'No especificado';
                
                // Llantas y frenos
                $datosComparacion['caracteristicas']['llantas_frenos']['neumatico_delantero'][$index] = $moto->neumatico_delantero ?? 'No especificado';
                $datosComparacion['caracteristicas']['llantas_frenos']['neumatico_posterior'][$index] = $moto->neumatico_posterior ?? 'No especificado';
                $datosComparacion['caracteristicas']['llantas_frenos']['freno_delantero'][$index] = $moto->freno_delantero ?? 'No especificado';
                $datosComparacion['caracteristicas']['llantas_frenos']['freno_posterior'][$index] = $moto->freno_posterior ?? 'No especificado';
                
                // Adicionales
                $datosComparacion['caracteristicas']['adicionales']['cargador_usb'][$index] = $moto->cargador_usb ? 'Sí' : 'No tiene';
                $datosComparacion['caracteristicas']['adicionales']['luz_led'][$index] = $moto->luz_led ? 'Sí' : 'No tiene';
                $datosComparacion['caracteristicas']['adicionales']['alarma'][$index] = $moto->alarma ? 'Sí' : 'No tiene';
                $datosComparacion['caracteristicas']['adicionales']['cajuela'][$index] = $moto->cajuela ? 'Sí' : 'No';
                $datosComparacion['caracteristicas']['adicionales']['tablero_led'][$index] = $moto->tablero_led ? 'Digital' : 'No tiene';
                $datosComparacion['caracteristicas']['adicionales']['mp3'][$index] = $moto->mp3 ? 'Sí' : 'No tiene';
                $datosComparacion['caracteristicas']['adicionales']['bluetooth'][$index] = $moto->bluetooth ? 'Sí' : 'No tiene';
            }

            return response()->json([
                'status' => 'success',
                'data' => $datosComparacion
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al comparar los modelos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene los detalles de un modelo de moto específico
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function obtenerDetalleModelo(int $id): JsonResponse
    {
        try {
            $moto = Moto::with(['modelo.marca', 'tipoMoto'])
                ->where('id_moto', $id)
                ->first();

            if (!$moto) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Moto no encontrada'
                ], 404);
            }

            $detalle = [
                'id' => $moto->id_moto,
                'nombre' => $moto->modelo->nombre ?? 'Sin nombre',
                'marca' => $moto->modelo->marca->nombre ?? 'Sin marca',
                'tipo' => $moto->tipoMoto->nombre ?? 'Sin tipo',
                'año' => $moto->año,
                'precio_base' => $moto->precio_base,
                'color' => $moto->color,
                'stock' => $moto->stock,
                'descripcion' => $moto->descripcion,
                'imagen' => $moto->imagen,
                'especificaciones' => [
                    'motor' => $moto->motor,
                    'cilindrada' => $moto->cilindrada,
                    'potencia' => $moto->potencia,
                    'arranque' => $moto->arranque,
                    'transmision' => $moto->transmision,
                    'capacidad_tanque' => $moto->capacidad_tanque,
                    'peso_neto' => $moto->peso_neto,
                    'carga_util' => $moto->carga_util,
                    'peso_bruto' => $moto->peso_bruto,
                    'dimensiones' => [
                        'largo' => $moto->largo,
                        'ancho' => $moto->ancho,
                        'alto' => $moto->alto,
                    ],
                    'neumaticos' => [
                        'delantero' => $moto->neumatico_delantero,
                        'posterior' => $moto->neumatico_posterior,
                    ],
                    'frenos' => [
                        'delantero' => $moto->freno_delantero,
                        'posterior' => $moto->freno_posterior,
                    ],
                    'caracteristicas_adicionales' => [
                        'cargador_usb' => $moto->cargador_usb,
                        'luz_led' => $moto->luz_led,
                        'alarma' => $moto->alarma,
                        'cajuela' => $moto->cajuela,
                        'tablero_led' => $moto->tablero_led,
                        'mp3' => $moto->mp3,
                        'bluetooth' => $moto->bluetooth,
                    ]
                ]
            ];

            return response()->json([
                'status' => 'success',
                'detalle' => $detalle
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener los detalles del modelo: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene todas las marcas disponibles con sus modelos
     * 
     * @return JsonResponse
     */
    public function obtenerMarcasYModelos(): JsonResponse
    {
        try {
            $marcas = Marca::with(['modelos' => function ($query) {
                $query->whereHas('motos', function ($q) {
                    $q->where('stock', '>', 0);
                });
            }])
            ->whereHas('modelos.motos', function ($query) {
                $query->where('stock', '>', 0);
            })
            ->get()
            ->map(function ($marca) {
                return [
                    'id' => $marca->id_marca,
                    'nombre' => $marca->nombre,
                    'modelos' => $marca->modelos->map(function ($modelo) {
                        return [
                            'id' => $modelo->id_modelo,
                            'nombre' => $modelo->nombre,
                            'cilindrada' => $modelo->cilindrada,
                            'imagen' => $modelo->imagen ?? '',
                        ];
                    })
                ];
            });

            return response()->json([
                'status' => 'success',
                'marcas' => $marcas
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener las marcas y modelos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene todos los tipos de motos disponibles
     * 
     * @return JsonResponse
     */
    public function obtenerTiposMotos(): JsonResponse
    {
        try {
            $tipos = TipoMoto::whereHas('motos', function ($query) {
                $query->where('stock', '>', 0);
            })
            ->get()
            ->map(function ($tipo) {
                return [
                    'id' => $tipo->id_tipo_moto,
                    'nombre' => $tipo->nombre,
                    'descripcion' => $tipo->descripcion
                ];
            });

            return response()->json([
                'status' => 'success',
                'tipos' => $tipos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener los tipos de motos: ' . $e->getMessage()
            ], 500);
        }
    }
}
