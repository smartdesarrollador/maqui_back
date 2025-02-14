<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaArticulo extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'categoria_articulos';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Obtiene los artículos que pertenecen a esta categoría
     */
    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'categoria_id', 'id');
    }
}
