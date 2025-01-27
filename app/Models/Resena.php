<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'resenas';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_resena';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'cliente_id',
        'moto_id',
        'calificacion',
        'comentario'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene el cliente que hizo la reseña
     */
    public function cliente()
    {
        return $this->belongsTo(ClienteModel::class, 'cliente_id', 'id_cliente');
    }

    /**
     * Obtiene la moto que fue reseñada
     */
    public function moto()
    {
        return $this->belongsTo(Moto::class, 'moto_id', 'id_moto');
    }
}
