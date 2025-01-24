<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Medio;

class TipoMedio extends Model
{
    use HasFactory;

    protected $table = 'tipos_medios';

    protected $primaryKey = 'id_tipos_medios';

    public function medios()
    {
        return $this->hasMany(Medio::class, 'id_tipos_medios', 'id_tipos_medios');
    }
}
