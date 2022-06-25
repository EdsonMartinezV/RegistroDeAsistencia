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
        Schema::create('catalogo_de_incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('resultante');
            $table->boolean('penalizacion');
            $table->double('porcentaje_penalizacion', 8, 2)
                ->nullable();
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
        Schema::dropIfExists('catalogo_de_incidencias');
    }
};
