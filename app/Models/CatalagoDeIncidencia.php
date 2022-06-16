<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalagoDeIncidencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'motivo',
        'inicio_periodo',
        'fin_periodo',
        'resultante',
        'penalizacion',
        'porcentaje_penalizacion'
    ];

    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }
}
