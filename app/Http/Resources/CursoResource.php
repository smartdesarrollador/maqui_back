<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Incluimos los estudiantes cuando estén cargados con la relación
            'estudiantes' => EstudianteResource::collection($this->whenLoaded('estudiantes')),
            
            // Información de la inscripción cuando se carga a través de la relación pivot
            'inscripcion' => $this->when($this->pivot, function () {
                return [
                    'fecha_inscripcion' => $this->pivot->fecha_inscripcion,
                    'calificacion' => $this->pivot->calificacion,
                ];
            }),
        ];
    }
}
