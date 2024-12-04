<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro_estudiante_id');
            $table->unsignedBigInteger('curso_id');
            $table->string('asunto', 255); 
            $table->text('contenido'); 
            $table->timestamp('fecha_envio'); 
            $table->enum('estado', ['Enviado', 'Leído'])->default('Enviado'); 
            $table->timestamp('fecha_lectura')->nullable();
            $table->timestamps();

            // Relaciones
            $table->foreign('registro_estudiante_id')->references('id')->on('registro_estudiantes')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}