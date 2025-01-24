<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Categoria1Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'varchar1' => $this->varchar1,
            'varchar2' => $this->varchar2,
            'varchar3' => $this->varchar3,
            'text1' => $this->text1,
            'boolean1' => $this->boolean1,
            'date1' => $this->date1,
            'time1' => $this->time1,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'registros' => Tabla1Resource::collection($this->whenLoaded('tabla1')),
        ];
    }
}
