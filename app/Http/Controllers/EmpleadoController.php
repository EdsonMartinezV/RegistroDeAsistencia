<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Dia;
use App\Models\Periodo;
use App\Models\Registro;
use DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmpleadoController extends Controller
{
    var $dias = [
        'Monday' => 'Lunes',
        'Thursday' => 'Martes',
        'Wednesday' => 'Miercoles',
        'Tuesday' => 'Jueves',
        'Friday' => 'Viernes',
        'Saturday' => 'Sabado',
        'Sunday' => 'Domingo'
    ];

    public function mostrarEmpleados(){
        $empleados = Empleado::all();
        return view('empleados', compact('empleados'));
    }

    public function mostrarCardex($empleadoId) {
        date_default_timezone_set("America/Mexico_City");
        global $dias;
        $empleado = Empleado::find($empleadoId);
        $registros = $empleado->registros()->orderBy('hora', 'asc')->get();
        $registro = $registros->first()->hora;
        $fecha = new Carbon($registro);
        $dia = $fecha->day;
        dd($fecha, $dias[$fecha->dayName]);

        /* $cardex = [
            'enero' => {
                1=>
                2=>
            };
        ]; */
        $registros->foreach(function($registro) {
            $fecha = new Carbon($registro->hora);
            $mesActual = $fecha->month;
            $cardex[$mesActual] = $fecha->monthName;
        });

        return view('cardex', compact('registros', 'registro', 'fecha'));
    }

    public function Faltas(Request $request, $id) {
        // $Periodo = Empleado::find($id)->dias;
         /* $Periodo = Empleado::find(1)->periodos; */
        // dd($Periodo);
    /*  $registros = Empleado::find($id)->registros()->whereBetween('hora', [$request->inicio, $request->Termino])
        ->get();
        dd($registros); */
//
        $reportes_faltas = Empleado::find($id)
        -> join('registros','empleados.id', '=', 'registros.empleado_id') ->whereBetween('hora', [$request->inicio, $request->Termino])->where('registros.empleado_id','=',$id)
        ->join('periodos','empleados.id', '=', 'periodos.empleado_id')->where('periodos.empleado_id','=',$id)
        -> join('dias','periodos.id', '=', 'dias.periodo_id')
        -> join('catalogo_de_horarios','dias.catalogo_de_horarios_id', '=', 'catalogo_de_horarios.id')
        ->get(); 


        dd($reportes_faltas);
        return view('cardex', compact('registros', 'registro', 'fecha'));
    }
}
