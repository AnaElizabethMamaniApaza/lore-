<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Especificar los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
    ];
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'curso_id');
    }
    public function notas()
    {
        return $this->hasMany(Nota::class, 'curso_id');
    }
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
}
