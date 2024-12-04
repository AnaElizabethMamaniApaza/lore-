<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();  // ID de la asistencia
            $table->foreignId('estudiante_id')->constrained('registro_estudiantes')->onDelete('cascade');  // Relación con los estudiantes
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');  // Relación con los cursos
            $table->date('fecha');  // Fecha de la asistencia
            $table->time('hora');  // Hora de la asistencia
            $table->enum('estado', ['presente', 'ausente', 'justificado'])->default('ausente');  // Columna para el estado
            $table->timestamps();  // Marca de tiempo (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}
