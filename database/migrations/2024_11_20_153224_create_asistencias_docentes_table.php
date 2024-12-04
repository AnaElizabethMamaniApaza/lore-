<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asistencias_docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id');
            $table->date('fecha');
            $table->enum('estado', ['presente', 'ausente', 'justificado']);
            $table->timestamps();

            // Relación con la tabla docentes
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asistencias_docentes');
    }
};
