<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['curso_id', 'dia', 'hora_inicio', 'hora_fin', 'hora_recreo'];

    // Relación con el modelo Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
