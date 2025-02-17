<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstudianteCursoResource extends JsonResource
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
            'estudiante_id' => $this->estudiante_id,
            'curso_id' => $this->curso_id,
            'fecha_inscripcion' => $this->fecha_inscripcion,
            'calificacion' => $this->calificacion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            // Incluimos la información completa del estudiante cuando esté cargada
            'estudiante' => new EstudianteResource($this->whenLoaded('estudiante')),
            
            // Incluimos la información completa del curso cuando esté cargado
            'curso' => new CursoResource($this->whenLoaded('curso')),
        ];
    }
}
