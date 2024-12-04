<?php

// Migración para crear la tabla 'secciones'
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionesTable extends Migration
{
    public function up()
    {
        Schema::create('secciones', function (Blueprint $table) {
            $table->id(); // ID de la sección
            $table->foreignId('curso_id')->constrained('cursos'); // Relación con la tabla cursos
            $table->foreignId('docente_id')->constrained('docentes'); // Relación con la tabla docentes
            $table->foreignId('horario_id')->constrained('horarios'); // Relación con la tabla horarios
            $table->json('estudiantes')->nullable(); // Lista de estudiantes en formato JSON (hasta 10 estudiantes)
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('secciones');
    }
}