<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtipoDeIncidencia extends Model
{
    use HasFactory;
    protected $table = 'subtipos_de_incidencia';
    protected $fillable = [
        'descripcion',
        'catalogo_de_incidencias_id'
    ];

    public function incidencias(){
        return $this->belongsTo(Incidencia::class);
    }
}
