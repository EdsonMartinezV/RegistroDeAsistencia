<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoDeHorario extends Model
{
    use HasFactory;
    protected $fillable = [
        'hora_entrada',
        'hora_salida',
        'dias'
    ];

    public function empleados() {
        return $this->belongsToMany(Empleado::class,
            'empleado_catalogo_de_horario',
            'empleado_id',
            'catalogo_de_horario_id',
        );
    }
}
