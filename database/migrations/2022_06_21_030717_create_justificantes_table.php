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
        Schema::create('justificantes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_final')
                ->nullable();
            $table->string('horario');
            $table->integer('num_memorandum');
            $table->foreignId('empleado_id')
                ->constrained('empleados')->onUpdate('cascade') ->onDelete('cascade');
            $table->foreignId('catalogo_de_incidencias_id')
                ->constrained('catalogo_de_incidencias')->onUpdate('cascade') ->onDelete('cascade');
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
        Schema::dropIfExists('justificantes');
    }
};
