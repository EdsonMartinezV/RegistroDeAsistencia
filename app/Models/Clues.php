<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clues extends Model
{
    use HasFactory;
    protected $table = 'catalogo_de_clues';
    protected $fillable = [
        'clues',
        'nombre_entidad'
    ];
}