<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clues extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'catalogo_de_clues';
    protected $factory = 'database\factories\CatalogoDeClueFactory';
    protected $fillable = [
        'clues',
        'nombre_entidad'
    ];
}
