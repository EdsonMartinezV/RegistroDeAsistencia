<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = 'catalogo_de_horarios';
    public $timestamps = false;
    protected $fillable = [
        'hora_entrada',
        'hora_salida',
        'descripcion',
        'hora_inicio_checada_entrada',
        'hora_fin_checada_entrada',
        'hora_inicio_checada_salida',
        'hora_fin_checada_salida'
    ];

    public function dias(){
        return $this->belongsToMany(Dia::class);
    }
}
