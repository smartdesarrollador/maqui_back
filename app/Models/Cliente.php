<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Inscripcion;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = 'id_cliente';


    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'inscripcion_id', 'id_inscripcion');
    }
}
