<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoDeClue extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'clues',
        'nombre_entidad',
        'clave_entidad',
        'nombre_municipio',
        'clave_municipio',
        'nombre_localidad',
        'clave_localidad',
        'nombre_jurisdiccion',
        'clave_jurisdiccion',
        'nombre_institucion',
        'clave_institucion',
        'nombre_tipo_establecimiento',
        'clave_tipo_establecimiento',
        'nombre_tipologia',
        'clave_tipologia',
        'nombre_subtipologia',
        'clave_subtipologia',
        'clave_scian',
        'descripcion_clave_scian',
        'consultorios_med_gral',
        'consultorios_otras_areas',
        'total_consultorios',
        'camas_area_hos',
        'camas_otras_areas',
        'total_camas',
        'nombre_unidad',
        'clave_vialidad',
        'tipo_vialidad',
        'vialidad',
        'num_exterior',
        'num_interior',
        'clave_tipo_asentamiento',
        'tipo_asentamiento',
        'asentamiento',
        'entre_tipo_vialidad_1',
        'entre_vialidad_1',
        'entre_tipo_vialidad_2',
        'entre_vialidad_2',
        'observaciones_direccion',
        'codigo_postal',
        'estatus_operacion',
        'clave_estatus_operacion',
        'licencia_sanitaria',
        'num_licencia_sanitaria',
        'aviso_funcionamiento',
        'fecha_emision_av_fun',
        'rfc_establecimiento',
        'fecha_construccion',
        'fecha_inicio_operacion',
        'unidad_movil_marca',
        'unidad_movil_modelo',
        'unidad_movil_capacidad',
        'unidad_movil_programa',
        'unidad_movil_clave_programa',
        'unidad_movil_tipo',
        'unidad_movil_clave_tipo',
        'unidad_movil_clave_tipologia',
        'latitud',
        'longitud',
        'nombre_ins_adm',
        'clave_ins_adm',
        'nivel_atencion',
        'clave_nivel_atencion',
        'estatus_acreditacion',
        'clave_estatus_acreditacion',
        'acreditacion',
        'subacreditacion',
        'estrato_unidad',
        'clave_estato_unidad',
        'tipo_obra',
        'clave_tipo_obra',
        'horario_atencion',
        'areas_servicios',
        'ultimo_movimiento',
        'fecha_ultimo_movimiento',
        'motivo_baja',
        'fecha_efectiva_baja',
        'certificacion_csg',
        'tipo_certificacion',
        'vigencia_certificacion',
    ];
}
