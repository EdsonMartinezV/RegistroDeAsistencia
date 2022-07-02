<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\Periodo;
use App\Models\Horario;
use App\Models\Registro;
use App\Models\Dia;
use Carbon\Carbon;

class FaltasController extends Controller
{
    public function verificarPeriodo(Request $request, $id){
        $datos=$request->all();
        date_default_timezone_set("America/Mexico_City");
        $dia = new DateTime();

        $periodo = Periodo::where('empleado_id', $id)
        ->where('inicio_periodo_laboral', '<=', $dia)
        ->where('fin_periodo_laboral', '>=', $dia)
        ->First();
        return $this->obtenerRegistros($datos,$periodo,$id);
         
    }

    public function obtenerRegistros($datos,$periodo,$id){
        $registros=Registro::whereBetween('hora', [$datos['inicio'], $datos['Termino']])
        ->get();
        return $this->obtenerDias($datos,$periodo,$id,$registros);
    }

    public function obtenerDias($datos, $periodo, $id,$registros) {
        $dias=Dia::where('periodo_id','=', $periodo['id'])
        ->get();
        // dd($dias);
        $registros->foreach(function($registro){
            dd($registro->dia);
        });
    }
}
