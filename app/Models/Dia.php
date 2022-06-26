<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'dia_entrada',
        'dia_salida',
        'periodo_id',
        'catalogo_de_horarios_id'
    ];

    public function periodos(){
        return $this->belongsToMany(Periodo::class);
    }

    public function horarios(){
        return $this->belongsToMany(Horario::class);
    }
}
