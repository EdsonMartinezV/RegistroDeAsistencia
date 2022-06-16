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
        Schema::create('catalago_de_incidencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('motivo');
            $table->date('inicio_periodo');
            $table->date('fin_periodo');
            $table->string('resultante');
            $table->boolean('penalizacion')->default(false);
            $table->double('porcentaje_penalizacion', 8, 2)->nullable();
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
        Schema::dropIfExists('catalago_de_incidencias');
    }
};
