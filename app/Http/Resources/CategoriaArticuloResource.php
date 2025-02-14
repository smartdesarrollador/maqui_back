<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaArticuloResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // Incluye los artículos solo si la relación está cargada
            'articulos' => $this->whenLoaded('articulos', function() {
                return $this->articulos->map(function($articulo) {
                    return [
                        'id' => $articulo->id,
                        'nombre' => $articulo->nombre,
                        'descripcion' => $articulo->descripcion,
                        'precio' => $articulo->precio,
                        'categoria_id' => $articulo->categoria_id,
                        'created_at' => $articulo->created_at,
                        'updated_at' => $articulo->updated_at
                    ];
                });
            }),
           
            'total_articulos' => $this->whenLoaded('articulos', function() {
                return $this->articulos->count();
            }),
            'precio_promedio_articulos' => $this->whenLoaded('articulos', function() {
                return $this->articulos->avg('precio');
            })
        ];
    }
}
