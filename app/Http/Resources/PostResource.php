<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'titulo' => $this->titulo,
            'contenido' => $this->contenido,
            'estado' => $this->estado,
            'fecha_publicacion' => $this->fecha_publicacion,
            'ruta_imagen' => $this->ruta_imagen, // Agregar la URL de la imagen
            'imagen' => $this->imagen, // Agregar el nombre de la imagen
            'autor' => new UserResource($this->whenLoaded('autor')),
            'categorias' => CategoryResource::collection($this->whenLoaded('categorias')), // Devolver categorías asociadas
            'comentarios' => CommentResource::collection($this->whenLoaded('comentarios')), // Devolver comentarios si están cargados
            'tags' => TagResource::collection($this->whenLoaded('tags')), // Devolver tags asociados
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
