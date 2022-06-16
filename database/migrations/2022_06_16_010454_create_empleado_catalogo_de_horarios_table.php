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
        Schema::create('empleado_catalogo_de_horarios', function (Blueprint $table) {
            $table->id();
            $table->date('inicio_periodo_laboral');
            $table->date('fin_periodo_laboral');
            $table->foreignId('empleado_id')
                ->constrained('empleados');
            $table->foreignId('catalogo_de_horario_id')
                ->constrained('catalogo_de_horarios');
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
        Schema::dropIfExists('empleado_catalogo_de_horarios');
    }
};
