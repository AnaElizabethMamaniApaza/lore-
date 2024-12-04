<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesTable extends Migration
{
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade'); // Relación con la tabla cursos
            $table->string('nombre');
            $table->date('fecha');
            $table->enum('tipo', ['examen', 'tarea', 'exposicion']); // Tipo de evaluación
            $table->text('descripcion')->nullable(); // Descripción de la evaluación
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluaciones');
    }
}
