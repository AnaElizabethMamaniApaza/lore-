<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->string('materia');
            $table->date('fecha_contratacion');
            $table->string('titulo_academico')->nullable();
            $table->text('experiencia_educativa')->nullable();
            $table->decimal('salario', 8, 2)->nullable();
            $table->string('horario')->nullable();
            $table->string('estado_contrato');
            // Agregamos los campos de documento
            $table->string('documento_tipo'); // Tipo de documento (DNI, RUC, etc.)
            $table->string('documento_numero'); // Número del documento
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('docentes');
    }
}
