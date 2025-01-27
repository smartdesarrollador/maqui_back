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
}
