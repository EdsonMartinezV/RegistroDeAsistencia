<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'inicio_periodo_laboral',
        'fin_periodo_laboral',
        'empleado_id'
    ];

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function dias(){
        return $this->belongsToMany(Dia::class);
    }
}
