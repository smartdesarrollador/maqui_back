<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaConArticulos extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        // Extendemos CategoriaArticuloResource
        $categoria = (new CategoriaArticuloResource($this))->toArray($request);
        
        // Agregamos los campos adicionales
        return array_merge($categoria, [
            'articulos' => $this->whenLoaded('articulos', function() {
                return ArticuloResource::collection($this->articulos);
            }),
            'total_articulos' => $this->whenLoaded('articulos', function() {
                return $this->articulos->count();
            }),
            'precio_promedio_articulos' => $this->whenLoaded('articulos', function() {
                return $this->articulos->avg('precio');
            })
        ]);
    }
} 