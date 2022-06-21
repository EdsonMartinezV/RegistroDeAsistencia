<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtipoDeIncidencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'catalogo_de_incidencias_id'
    ];

    public function catalogoDeIncidencias()
    {
        return $this->belongsTo(CatalogoDeIncidencia::class);
    }
}
