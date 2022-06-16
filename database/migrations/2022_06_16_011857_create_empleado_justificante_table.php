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
        Schema::create('empleado_justificante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')
                ->constrained('empleados');
            $table->foreignId('justificante_id')
                ->constrained('justificantes');
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
        Schema::dropIfExists('empleado_justificante');
    }
};
