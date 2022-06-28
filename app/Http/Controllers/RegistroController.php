<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Empleado;
use App\Models\Periodo;
use DateTime;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function validarAsistencia(Request $request){
        $request->validate([
            'empleado_id' => 'required',
        ]);

        $datos=$request->all();
        return $this->comprobarEmpleado($datos);
    }

    public function comprobarEmpleado($datos){

        $empleado = Empleado::find($datos['empleado_id']);
        if(!empty($empleado)){
            return $this->crearRegistro($datos);
        }
       
    }

    public function crearRegistro($datos){
        date_default_timezone_set("America/Mexico_City");
        $hora_registro = new DateTime();
       

        $registro = new Registro;
        $registro->hora = $hora_registro;
        $registro->empleado_id = $datos['empleado_id'];
        $registro->save();
        return redirect()->route('formularioAsistencia');
         
    }

    /*public function validarDia($datos, $empleado){
        //dd($datos);
        $periodo = Periodo::all()->where('empleado_id', $datos['empleado_id']);

        $fecha = date('y/m/d');
        dd($fecha);
         
    }*/
}
