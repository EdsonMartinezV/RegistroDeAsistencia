<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $fillable = [
        'hora',
        'tipo',
        'empleado_id'
    ];

    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }
}
