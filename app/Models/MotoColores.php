<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MotoColores extends Model
{
    use HasFactory;

    /**
     * Tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'moto_colores';

    /**
     * Clave primaria del modelo.
     *
     * @var string
     */
    protected $primaryKey = 'id_moto_color';

    /**
     * Atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'modelo_id',
        'color',
        'imagen_color',
    ];

    /**
     * Relación con el modelo Modelo.
     *
     * @return BelongsTo
     */
    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class, 'modelo_id', 'id_modelo');
    }
}
