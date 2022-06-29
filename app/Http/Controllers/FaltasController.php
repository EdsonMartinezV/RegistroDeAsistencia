<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\Periodo;
use App\Models\Horario;

class FaltasController extends Controller
{
    public function verificarPeriodo(Request $request, $id){
        $datos=$request->all();
        date_default_timezone_set("America/Mexico_City");
        $dia = new DateTime();

        $periodo = Periodo::where('empleado_id', $id)
        ->where('inicio_periodo_laboral', '<=', $dia)
        ->where('fin_periodo_laboral', '>=', $dia)
        ->get();
        dd($periodo);
        return $this->verificarFaltas($datos,$periodo,$id);
         
    }

    public function verificarFaltas($datos,$periodo,$id){

         
    }
}
