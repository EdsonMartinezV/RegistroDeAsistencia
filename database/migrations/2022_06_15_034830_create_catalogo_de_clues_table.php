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
            $table->string("clues",200)->nullable();
            $table->string("nombre_entidad",200)->nullable();
            $table->integer('clave_entidad');
            $table->string("nombre_municipio",200)->nullable();
            $table->integer("clave_municipio");
            $table->string("nombre_localidad",200)->nullable();
            $table->integer("clave_localidad");
            $table->string("nombre_jurisdiccion",200)->nullable();
            $table->integer("clave_jurisdiccion");
            $table->string("nombre_institucion",200)->nullable();
            $table->string("clave_institucion",200)->nullable();
            $table->string("nombre_tipo_establecimiento",200)->nullable();
            $table->smallInteger("clave_tipo_establecimiento");
            $table->string("nombre_tipologia",200)->nullable();
            $table->string("clave_tipologia",200)->nullable();
            $table->string("nombre_subtipologia",200)->nullable();
            $table->string("clave_subtipologia",200)->nullable();
            $table->integer("clave_scian");
            $table->string("descripcion_clave_scian",200)->nullable();
            $table->integer("consultorios_med_gral");
            $table->integer("consultorios_otras_areas");
            $table->integer("total_consultorios");
            $table->integer("camas_area_hos");
            $table->integer("camas_otras_areas");
            $table->integer("total_camas");
            $table->string("nombre_unidad",200)->nullable();
            $table->smallInteger("clave_vialidad");
            $table->string("tipo_vialidad",200)->nullable();
            $table->string("vialidad",200)->nullable();
            $table->string("num_exterior",200)->nullable();
            $table->string("num_interior",200)->nullable();
            $table->integer("clave_tipo_asentamiento");
            $table->string("tipo_asentamiento",200)->nullable();
            $table->string("asentamiento",200)->nullable();
            $table->string("entre_tipo_vialidad_1",200)->nullable();
            $table->string("entre_vialidad_1",200)->nullable();
            $table->string("entre_tipo_vialidad_2",200)->nullable();
            $table->string("entre_vialidad_2",200)->nullable();
            $table->string("observaciones_direccion",200)->nullable();
            $table->integer("codigo_postal");
            $table->string("estatus_operacion",200)->nullable();
            $table->smallInteger("clave_estatus_operacion");
            $table->boolean("licencia_sanitaria");
            $table->string("num_licencia_sanitaria",200)->nullable();
            $table->boolean("aviso_funcionamiento");
            $table->date("fecha_emision_av_fun");
            $table->string("rfc_establecimiento",200)->nullable();
            $table->date("fecha_construccion");
            $table->date("fecha_inicio_operacion");
            $table->string("unidad_movil_marca",200)->nullable();
            $table->string("unidad_movil_modelo",200)->nullable();
            $table->integer("unidad_movil_capacidad");
            $table->string("unidad_movil_programa",200)->nullable();
            $table->string("unidad_movil_clave_programa",200)->nullable();
            $table->string("unidad_movil_tipo",200)->nullable();
            $table->string("unidad_movil_clave_tipo",200)->nullable();
            $table->integer("unidad_movil_clave_tipologia");
            $table->double("latitud",8,2);
            $table->double("longitud",8,2);
            $table->string("nombre_ins_adm",200)->nullable();
            $table->string("clave_ins_adm",200)->nullable();
            $table->string("nivel_atencion",200)->nullable();
            $table->integer("clave_nivel_atencion");
            $table->string("estatus_acreditacion",200)->nullable();
            $table->string("clave_estatus_acreditacion",200)->nullable();
            $table->string("acreditacion",200)->nullable();
            $table->string("subacreditacion",200)->nullable();
            $table->string("estrato_unidad",200)->nullable();
            $table->smallInteger("clave_estrato_unidad");
            $table->string("tipo_obra",200)->nullable();
            $table->smallInteger("clave_tipo_obra");
            $table->string("horario_atencion",200)->nullable();
            $table->string("areas_servicios",200)->nullable();
            $table->string("ultimo_movimiento",200)->nullable();
            $table->date("fecha_ultimo_movimiento");
            $table->string("motivo_baja",200)->nullable();
            $table->date("fecha_efectiva_baja");
            $table->string("certificacion_csg",200)->nullable();
            $table->string("tipo_certificacion",200)->nullable();
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
