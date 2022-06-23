<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function registrarAsistencia(Request $request){
        $request->validate([
            'empleado_id' => 'required',
            'hora' => 'required',
        ]);
       
        return redirect()->route('client.add.image');
    }
}
