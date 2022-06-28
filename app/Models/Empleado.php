<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
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
}
