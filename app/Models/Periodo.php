<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $fillable = [
        'inicio_periodo_laboral',
        'fin_periodo_laboral',
        'empleado_id'
    ];
}
