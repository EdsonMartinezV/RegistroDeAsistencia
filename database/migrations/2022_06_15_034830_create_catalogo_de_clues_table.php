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
            $table->string("clues")->nullable();
            $table->string("nombre_entidad")->nullable();
            $table->integer('clave_entidad');
            $table->string("nombre_municipio")->nullable();
            $table->integer("clave_municipio");
            $table->string("nombre_localidad")->nullable();
            $table->integer("clave_localidad");
            $table->string("nombre_jurisdiccion")->nullable();
            $table->integer("clave_jurisdiccion");
            $table->string("nombre_institucion")->nullable();
            $table->string("clave_institucion")->nullable();
            $table->string("nombre_tipo_establecimiento")->nullable();
            $table->smallInteger("clave_tipo_establecimiento");
            $table->string("nombre_tipologia")->nullable();
            $table->string("clave_tipologia")->nullable();
            $table->string("nombre_subtipologia")->nullable();
            $table->string("clave_subtipologia")->nullable();
            $table->integer("clave_scian");
            $table->string("descripcion_clave_scian")->nullable();
            $table->integer("consultorios_med_gral");
            $table->integer("consultorios_otras_areas");
            $table->integer("total_consultorios");
            $table->integer("camas_area_hos");
            $table->integer("camas_otras_areas");
            $table->integer("total_camas");
            $table->string("nombre_unidad")->nullable();
            $table->smallInteger("clave_vialidad");
            $table->string("tipo_vialidad")->nullable();
            $table->string("vialidad")->nullable();
            $table->string("num_exterior")->nullable();
            $table->string("num_interior")->nullable();
            $table->integer("clave_tipo_asentamiento");
            $table->string("tipo_asentamiento")->nullable();
            $table->string("asentamiento")->nullable();
            $table->string("entre_tipo_vialidad_1")->nullable();
            $table->string("entre_vialidad_1")->nullable();
            $table->string("entre_tipo_vialidad_2")->nullable();
            $table->string("entre_vialidad_2")->nullable();
            $table->string("observaciones_direccion")->nullable();
            $table->integer("codigo_postal");
            $table->string("estatus_operacion")->nullable();
            $table->smallInteger("clave_estatus_operacion");
            $table->boolean("licencia_sanitaria");
            $table->string("num_licencia_sanitaria")->nullable();
            $table->boolean("aviso_funcionamiento");
            $table->date("fecha_emision_av_fun");
            $table->string("rfc_establecimiento")->nullable();
            $table->date("fecha_construccion");
            $table->date("fecha_inicio_operacion");
            $table->string("unidad_movil_marca")->nullable();
            $table->string("unidad_movil_modelo")->nullable();
            $table->integer("unidad_movil_capacidad");
            $table->string("unidad_movil_programa")->nullable();
            $table->string("unidad_movil_clave_programa")->nullable();
            $table->string("unidad_movil_tipo")->nullable();
            $table->string("unidad_movil_clave_tipo")->nullable();
            $table->integer("unidad_movil_clave_tipologia");
            $table->double("latitud",8,2);
            $table->double("longitud",8,2);
            $table->string("nombre_ins_adm")->nullable();
            $table->string("clave_ins_adm")->nullable();
            $table->string("nivel_atencion")->nullable();
            $table->integer("clave_nivel_atencion");
            $table->string("estatus_acreditacion")->nullable();
            $table->string("clave_estatus_acreditacion")->nullable();
            $table->string("acreditacion")->nullable();
            $table->string("subacreditacion")->nullable();
            $table->string("estrato_unidad")->nullable();
            $table->smallInteger("clave_estrato_unidad");
            $table->string("tipo_obra")->nullable();
            $table->smallInteger("clave_tipo_obra");
            $table->string("horario_atencion")->nullable();
            $table->string("areas_servicios")->nullable();
            $table->string("ultimo_movimiento")->nullable();
            $table->date("fecha_ultimo_movimiento");
            $table->string("motivo_baja")->nullable();
            $table->date("fecha_efectiva_baja");
            $table->string("certificacion_csg")->nullable();
            $table->string("tipo_certificacion")->nullable();
            $table->date("vigencia_certificacion");
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
