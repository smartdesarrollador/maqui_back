<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TipoMedio;

class Medio extends Model
{
    use HasFactory;

    protected $table = 'medios';

    protected $fillable = ['nombre', 'url'];

    protected $primaryKey = 'id_medios';

    public function tipos_medios()
    {
        return $this->belongsTo(TipoMedio::class, 'id_tipos_medios', 'id_tipos_medios');
    }
}
