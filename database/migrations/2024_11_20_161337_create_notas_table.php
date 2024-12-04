<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class
CreateNotasTable extends Migration
{
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro_estudiante_id'); // FK a registro_estudiantes
            $table->unsignedBigInteger('curso_id'); // FK a cursos
            $table->string('nota1')->nullable();
            $table->string('nota2')->nullable();
            $table->string('nota3')->nullable();
            $table->date('fecha')->nullable();
            $table->text('comentarios')->nullable();
            $table->timestamps();

            $table->foreign('registro_estudiante_id')->references('id')->on('registro_estudiantes')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
