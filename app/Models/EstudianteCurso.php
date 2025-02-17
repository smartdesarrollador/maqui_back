<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstudianteCurso extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'estudiante_curso';

    /**
     * La clave primaria del modelo.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<string>
     */
    protected $fillable = [
        'estudiante_id',
        'curso_id',
        'fecha_inscripcion',
        'calificacion',
    ];

    /**
     * Los atributos que deben ser convertidos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_inscripcion' => 'date',
        'calificacion' => 'decimal:1',
    ];

    /**
     * Obtiene el estudiante asociado a la inscripción.
     */
    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class);
    }

    /**
     * Obtiene el curso asociado a la inscripción.
     */
    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }
}
