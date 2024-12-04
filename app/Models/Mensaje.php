<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $table = 'mensajes';

    protected $fillable = [
        'registro_estudiante_id',
        'curso_id',
        'asunto',
        'contenido',
        'fecha_envio',
        'estado',
        'fecha_lectura',
    ];

    // Relación con estudiantes
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'registro_estudiante_id');
    }

    // Relación con cursos
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
