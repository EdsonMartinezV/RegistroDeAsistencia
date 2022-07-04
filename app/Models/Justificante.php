<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justificante extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'fecha_inicio',
        'fecha_final',
        'horario',
        'num_memorandum',
        'empleado_id',
        'catalogo_de_incidencias_id'
    ];

    public function incidencia(){
        return $this->belongsTo(Incidencia::class);
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
