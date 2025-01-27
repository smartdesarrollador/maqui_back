<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     */
    protected $table = 'cliente';

    /**
     * Clave primaria del modelo
     */
    protected $primaryKey = 'id_cliente';

    /**
     * Los atributos que son asignables masivamente
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'tipo_usuario',
        'tipo_documento',
        'numero_documento',
        'fecha_nacimiento',
        'departamento',
        'provincia',
        'distrito',
        'imagen'
    ];

    /**
     * Indica si el modelo debe tener marcas de tiempo
     */
    public $timestamps = true;

    /**
     * Obtiene las reseñas del cliente
     */
    public function resenas()
    {
        return $this->hasMany(Resena::class, 'cliente_id', 'id_cliente');
    }

    /**
     * Obtiene las cotizaciones del cliente
     */
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'cliente_id', 'id_cliente');
    }

    /**
     * Obtiene las motos a través de las reseñas
     */
    public function motosResenadas()
    {
        return $this->hasManyThrough(
            Moto::class,
            Resena::class,
            'cliente_id', // Clave foránea en reseñas
            'id_moto',    // Clave primaria en motos
            'id_cliente', // Clave primaria en clientes
            'moto_id'     // Clave foránea en reseñas
        );
    }

    /**
     * Obtiene las motos a través de las cotizaciones
     */
    public function motosCotizadas()
    {
        return $this->hasManyThrough(
            Moto::class,
            Cotizacion::class,
            'cliente_id',
            'id_moto',
            'id_cliente',
            'moto_id'
        );
    }
}
