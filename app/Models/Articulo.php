<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'articulos';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria_id'
    ];

    /**
     * Obtiene la categoría a la que pertenece el artículo
     */
    public function categoria()
    {
        return $this->belongsTo(CategoriaArticulo::class, 'categoria_id', 'id');
    }
}
