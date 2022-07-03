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
        Schema::create('dias', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('dia_entrada');
            $table->smallInteger('dia_salida');
            $table->foreignId('periodo_id')
                ->constrained('periodos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('catalogo_de_horarios_id')
                ->constrained('catalogo_de_horarios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('dias');
    }
};
