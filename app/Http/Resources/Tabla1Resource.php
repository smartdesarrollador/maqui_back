<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Tabla1Resource extends JsonResource
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
            'varchar4' => $this->varchar4,
            'varchar5' => $this->varchar5,
            'varchar6' => $this->varchar6,
            'varchar7' => $this->varchar7,
            'decimal1' => $this->decimal1,
            'decimal2' => $this->decimal2,
            'decimal3' => $this->decimal3,
            'text1' => $this->text1,
            'text2' => $this->text2,
            'text3' => $this->text3,
            'boolean1' => $this->boolean1,
            'date1' => $this->date1,
            'time1' => $this->time1,
            'categoria1' => new Categoria1Resource($this->whenLoaded('categoria1')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
