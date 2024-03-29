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
        Schema::create('subtipos_de_incidencia', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
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
        Schema::dropIfExists('subtipos_de_incidencia');
    }
};
