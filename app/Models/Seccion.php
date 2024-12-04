<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    // Los campos que se pueden llenar masivamente
    protected $fillable = [
        'curso_id',
        'docente_id',
        'horario_id',
        'estudiantes', // Campo que contiene la lista de estudiantes
    ];

    // Convierte el campo 'estudiantes' a un array JSON
    protected $casts = [
        'estudiantes' => 'array',
    ];

    // Relación con el modelo Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // Relación con el modelo Docente
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    // Relación con el modelo Horario
    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}
