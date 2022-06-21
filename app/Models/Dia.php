<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;
    protected $fillable = [
        'periodo_id',
        'catalogo_de_horarios_id',
        'dia'
    ];
}
