<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justificante extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tipo',
        'fecha_inicio',
        'fecha_final',
        'horario',
        'num_memorandum',
        'empleado_id',
        'catalogo_de_incidencias_id'
    ];

    public function incidencias(){
        return $this->belongsTo(Incidencia::class);
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
