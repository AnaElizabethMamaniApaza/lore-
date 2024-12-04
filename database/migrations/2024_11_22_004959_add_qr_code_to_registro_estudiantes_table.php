<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('registro_estudiantes', function (Blueprint $table) {
            $table->string('qr_code_path')->nullable()->after('documento_numero'); // Campo para almacenar la ruta del QR
        });
    }

    public function down()
    {
        Schema::table('registro_estudiantes', function (Blueprint $table) {
            $table->dropColumn('qr_code_path');
        });
    }
};
