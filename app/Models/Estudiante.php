<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Estudiante extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'estudiantes';

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
        'nombre',
        'email',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos específicos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Obtiene los cursos asociados al estudiante.
     */
    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(Curso::class, 'estudiante_curso')
            ->withPivot('fecha_inscripcion', 'calificacion')
            ->withTimestamps();
    }
}
