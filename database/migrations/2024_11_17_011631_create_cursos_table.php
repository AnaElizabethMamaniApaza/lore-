<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');           // Nombre del curso
            $table->text('descripcion');        // Descripción del curso
            $table->date('fecha_inicio');       // Fecha de inicio
            $table->date('fecha_fin');          // Fecha de fin
            $table->timestamps();              // Marca de tiempo (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
