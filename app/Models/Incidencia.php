<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'catalogo_de_incidencias';
    protected $fillable = [
        'tipo',
        'resultante',
        'penalizacion',
        'porcentaje_penalizacion'
    ];

    public function suptipoDeIncidencias(){
        return $this->hasMany(SuptipoDeIncidencia::class);
    }

    public function justificantes(){
        return $this->hasMany(Justificante::class);
    }
}
