<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Empleado;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function validarAsistencia(Request $request){
        $request->validate([
            'empleado_id' => 'required',
            'hora' => 'required',
        ]);

        $datos=$request->all();
        return $this->comprobarEmpleado($datos);
    }

    public function comprobarEmpleado($valores){

        $empleado = Empleado::find($valores['empleado_id']);
        if(!empty($empleado)){
            return $this->crearRegistro($valores, $empleado);
        }
       
    }

    public function crearRegistro($valores, $empleado){

        dd($valores);
       
    }
}
