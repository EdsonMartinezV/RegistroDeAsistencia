<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justificante extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'fecha_inicio',
        'fecha_final',
        'num_memorandum'
    ];

    public function empleados() {
        return $this->belongsToMany(Empleado::class,
            'empleado_justificante',
            'empleado_id',
            'justificante_id',
        );
    }
}
