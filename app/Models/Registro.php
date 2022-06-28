<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'hora',
        'empleado_id',
    ];

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
