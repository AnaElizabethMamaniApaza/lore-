<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'correo',
        'direccion',
        'telefono',
        'dni',
    ];

    // Relación con Estudiantes
    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'persona_id');
    }

    // Relación con Docentes
    public function docente()
    {
        return $this->hasOne(Docente::class, 'persona_id');
    }
}