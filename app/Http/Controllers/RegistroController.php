<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function validarAsistencia(Request $request){
        $request->validate([
            'empleado_id' => 'required',
            'hora' => 'required',
        ]);

        
    }
}
