<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* return parent::toArray($request); */

        return [
            'id' => $this->id,
            'id_articulo' => $this->id_articulo,
            'nombre_comentarista' => $this->nombre_comentarista,
            'contenido' => $this->contenido,
            'fecha_comentario' => $this->fecha_comentario,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
