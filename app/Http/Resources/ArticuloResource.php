<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticuloResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'categoria_id' => $this->categoria_id,
            'categoria' => new CategoriaArticuloResource($this->whenLoaded('categoria')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
