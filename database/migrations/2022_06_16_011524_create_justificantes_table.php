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
            $table->string('tipo');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_final');
            $table->string('num_memorandum');
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
