<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empleado extends Model
{
   
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'rfc',
        'curp',
        'tipo_trabajador',
        'catalogo_de_clues_id'
    ];

    public function registros(){
        return $this->hasMany(Registro::class);
    }

    public function clues(){
        return $this->belongsTo(Clues::class);
    }

    public function justificantes(){
        return $this->hasMany(Justificante::class);
    }

    public function periodos(){
        return $this->hasMany(Periodo::class);
    }

    public function dias(){
        return $this->hasManyThrough(Dia::class, Periodo::class);
    }
    
    public function horarios(){
        return $this->hasManyThrough(Horario::class, Dia::class);
    }

    public function faltas(){
        return $this->hasMany(Falta::class);
    }

    /* public function incidencias(){
        return $this->hasManyThrough(Incidencia::class, Justificante::class);
    } */
}
