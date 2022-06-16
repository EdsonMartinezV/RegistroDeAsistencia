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
        'catalago_de_clues_id',
    ];

    public function catalogoDeClue() {
        return $this->belongsTo(CatalogoDeClue::class);
    }

    public function catalogoDeIncidencias() {
        return $this->hasMany(CatalogoDeIncidencia::class,
            'empleado_catalogo_de_incidencia',
            'empleado_id',
            'catalogo_de_incidencia_id',
        );
    }

    public function catalogoDeHorarios() {
        return $this->belongsToMany(CatalogoDeHorario::class,
            'empleado_catalogo_de_horario',
            'empleado_id',
            'catalogo_de_horario_id',
        );
    }

    public function vacaciones() {
        return $this->hasMany(Vacacion::class, 'vacaciones');
    }

    public function cardex() {
        return $this->hasOne(Cardex::class);
    }

    public function faltas() {
        return $this->hasMany(Falta::class);
    }

    public function registros() {
        return $this->hasMany(Registro::class);
    }
    
    public function justificantes() {
        return $this->belongsToMany(Justificante::class,
            'empleado_justificante',
            'empleado_id',
            'justificante_id',
        );
    }

    

    

    

    
}
