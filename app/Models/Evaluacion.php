<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    // Definir la tabla
    protected $table = 'evaluaciones';

    // Habilitar asignación masiva
    protected $fillable = ['curso_id', 'nombre', 'fecha', 'tipo', 'descripcion'];

    // Relación con Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
