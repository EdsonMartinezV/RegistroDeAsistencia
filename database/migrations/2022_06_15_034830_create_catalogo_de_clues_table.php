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
        Schema::create('catalogo_de_clues', function (Blueprint $table) {
            $table->id();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->integer('');
            $table->string("",200)->nullable();
            $table->integer('');
            $table->string("",200)->nullable();
            $table->integer('');
            $table->string("",200)->nullable();
            $table->integer('');
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->smallInteger('');
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->integer('');
            $table->string("",200)->nullable();
            $table->integer('');
            $table->integer('');
            $table->integer('');
            $table->integer('');
            $table->integer('');
            $table->integer('');
            $table->string("",200)->nullable();
            $table->smallInteger('');
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->integer('');
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->integer('');
            $table->string("",200)->nullable();
            $table->smallInteger('');
            $table->boolean('');
            $table->string("",200)->nullable();
            $table->boolean('');
            $table->string("",200)->nullable();
            $table->date('');
            $table->date('');
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->integer('');
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->integer('');
            $table->double('',8,2);
            $table->double('',8,2);
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->integer('');
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->smallInteger('');
            $table->string("",200)->nullable();
            $table->smallInteger('');
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->date('');
            $table->string("",200)->nullable();
            $table->date('');
            $table->string("",200)->nullable();
            $table->string("",200)->nullable();
            $table->date('');
            $table->timestamps();

            //agregar llave foranea
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogo_de_clues');
    }
};
