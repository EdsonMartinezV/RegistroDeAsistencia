<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function validarAsistencia(Request $request){
        $request->validate([
            'empleado_id' => 'required',
            'hora' => 'required',
        ]);

        $registro = new Registro;
        $registro->hora=$request['id'];

        $registro->save();
       
        return redirect()->route('client.add.image');
    }
}
