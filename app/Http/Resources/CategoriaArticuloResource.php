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
            'articulos' => $this->when($this->relationLoaded('articulos'), 
                ArticuloResource::collection($this->articulos)
            ),
            'total_articulos' => $this->when($this->relationLoaded('articulos'), 
                $this->articulos->count()
            ),
            'precio_promedio_articulos' => $this->when($this->relationLoaded('articulos'),
                $this->articulos->avg('precio')
            )
        ];
    }
}
