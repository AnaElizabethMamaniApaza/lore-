<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    public function up()
    {
        // Crear la tabla persona
        Schema::create('persona', function (Blueprint $table) {
            $table->id(); // ID único
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('correo')->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('dni')->unique();
            $table->timestamps();
        });

        // Modificar tabla estudiantes para relacionarla con persona
        Schema::table('registro_estudiantes', function (Blueprint $table) {
            $table->unsignedBigInteger('persona_id')->nullable()->after('id');
            $table->foreign('persona_id')->references('id')->on('persona')->onDelete('cascade');
        });

        // Modificar tabla docentes para relacionarla con persona
        Schema::table('docentes', function (Blueprint $table) {
            $table->unsignedBigInteger('persona_id')->nullable()->after('id');
            $table->foreign('persona_id')->references('id')->on('persona')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('registro_estudiantes', function (Blueprint $table) {
            $table->dropForeign(['persona_id']);
            $table->dropColumn('persona_id');
        });

        Schema::table('docentes', function (Blueprint $table) {
            $table->dropForeign(['persona_id']);
            $table->dropColumn('persona_id');
        });

        Schema::dropIfExists('persona');
    }
}