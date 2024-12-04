<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla en la base de datos
    protected $table = 'docentes';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre_completo',
        'direccion',
        'telefono',
        'correo_electronico',
        'materia',
        'fecha_contratacion',
        'titulo_academico',
        'experiencia_educativa',
        'salario',
        'horario',
        'estado_contrato',
        'documento_tipo',  // Tipo de documento, por ejemplo DNI, RUC, etc.
        'documento_numero' // Número del documento (DNI, RUC, etc.)
    ];

    // Definir las relaciones si es que existen (por ejemplo, un docente puede tener varios estudiantes)
    // Ejemplo: Si un docente tiene muchos estudiantes:
    // public function estudiantes()
    // {
    //     return $this->hasMany(Estudiante::class);
    // }

    // Si tienes una relación inversa con otro modelo (por ejemplo, una relación con 'asignaciones', 'cursos', etc.):
    // public function asignaciones()
    // {
    //     return $this->hasMany(Asignacion::class);
    // }
}
