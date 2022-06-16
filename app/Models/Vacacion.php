<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacacion extends Model
{
    use HasFactory;
    protected $table = 'vacaciones';
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'empleado_id'
    ];

    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }
}
