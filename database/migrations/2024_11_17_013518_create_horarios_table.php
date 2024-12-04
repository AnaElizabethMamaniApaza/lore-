<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade'); 
            $table->string('dia', 15);
            $table->time('hora_inicio');
            $table->time('hora_fin'); 
            $table->time('hora_recreo')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
