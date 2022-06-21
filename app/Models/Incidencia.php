<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;
    protected $table = 'catalogo_de_incidencias';
    protected $fillable = [
        'fecha',
        'tipo',
        'inicio_periodo',
        'fin_periodo',
        'resultante',
        'penalizacion',
        'porcentaje_penalizacion',
        'num_memorandum'
    ];

    public function suptipoDeIncidencias()
    {
        return $this->hasMany(SuptipoDeIncidencia::class);
    }

    public function justificantes()
    {
        return $this->hasMany(Justificante::class);
    }
}
