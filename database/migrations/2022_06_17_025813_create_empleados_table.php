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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('rfc');
            $table->string('curp');
            $table->string('tipo_trabajador');
            $table->integer('horas_mensuales_disponibles');
            $table->foreignId('catalogo_de_clues_id')
                ->constrained('catalogo_de_clues')->onUpdate('cascade') ->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
