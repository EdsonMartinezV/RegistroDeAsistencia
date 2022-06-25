<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_de_horarios', function (Blueprint $table) {
            $table->id();
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->string('descripcion',80);
            $table->time('hora_inicio_checada_entrada');
            $table->time('hora_fin_checada_entrada');
            $table->time('hora_inicio_checada_salida');
            $table->time('hora_fin_checada_salida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogo_de_horarios');
    }
};
