<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla si es diferente al plural del nombre del modelo
    protected $table = 'registro_estudiantes';

    // Definimos los campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre_completo',
        'direccion',
        'telefono',
        'correo_electronico',
        'grado',
        'seccion',
        'fecha_hora_ingreso', // Campo de fecha y hora
        'nombre_padre',
        'nombre_madre',
        'telefono_padre',
        'telefono_madre',
        'documento_tipo',
        'documento_numero',
    ];

    // Indicamos cómo manejar el campo 'fecha_hora_ingreso'
    protected $casts = [
        'fecha_hora_ingreso' => 'datetime', // Esto asegura que se trate como un objeto de tipo DateTime
    ];

    // Relación con otras tablas (si es necesario)
    public function notas()
    {
        return $this->hasMany(Nota::class, 'registro_estudiantes_id');
    }
}
