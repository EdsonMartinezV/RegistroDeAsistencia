<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Dia;
use App\Models\Periodo;
use App\Models\Registro;
use DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DatePeriod;
use DateInterval;

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
     /*     $Periodo = Empleado::find(1)->periodos;
        dd($Periodo); */

        //obtener un intervalo que se puede recorrer entre las fechas que se requiere
        $inicio = new Carbon($request->inicio);
        $final = new Carbon($request->Termino);
        $intervalo = DateInterval::createFromDateString('1 day');
        $fechas = new DatePeriod($inicio, $intervalo, $final);

        //obtencion de los registros entre las fechas que se requieren
        $registros = Empleado::find($id)->registros()->whereBetween('hora', [$request->inicio, $request->Termino])
        ->orderBy('hora', 'asc')->get();
        
        //obtención de los dias de los periodos del empleado y catalogo horas de entrada/salida
        $horarios = Empleado::find($id)
        ->join('periodos','empleados.id', '=', 'periodos.empleado_id')->where('periodos.empleado_id','=',$id)
        -> join('dias','periodos.id', '=', 'dias.periodo_id')
        -> join('catalogo_de_horarios','dias.catalogo_de_horarios_id', '=', 'catalogo_de_horarios.id')
        ->get(); 

    
        $reporte_faltas = []; 
        $i = 0;
        //recorremos el intervalo de fechas
        foreach($fechas as $fecha){
            //guardamos el dia y fecha
            $reporte_faltas[strval($i)] = [
                'dia' => $fecha->dayName,
                'fecha' => $fecha->toDateString(),
            ];
            //guardamos el registro falta guardar sin borrar checar si funciona push
            foreach($registros as $registro){
                $hora = new Carbon($registro->hora);
                
              
                if($hora->toDateString() == $fecha->toDateString()){
                    //dd($hora->dayOfWeek);
                    foreach($horarios as $horario){
                        if($hora->dayOfWeek == $horario->dia_entrada){
                            if($hora->toTimeString()>=$horario->hora_inicio_checada_entrada && $hora->toTimeString()<=$horario->hora_fin_checada_entrada ){
                                $reporte_faltas[$i]['hora_entrada'] = $hora->toTimeString();
                            }
                        }
                        if($hora->dayOfWeek == $horario->dia_salida){
                            if($hora->toTimeString()>=$horario->hora_inicio_checada_salida && $hora->toTimeString()<=$horario->hora_fin_checada_salida ){
                                $reporte_faltas[$i]['hora_salida'] = $hora->toTimeString();
                            }
                        }
                    }
                    // 
                   
                }   
            }
            $i++;
        }
        dd($reporte_faltas);
        /* $reportes_faltas = Empleado::join('periodos','empleados.id', '=', 'periodos.empleado_id')
        -> join('dias','periodos.id', '=', 'dias.periodo_id')
        -> join('catalogo_de_horarios','dias.catalogo_de_horarios_id', '=', 'catalogo_de_horarios.id')
        -> where ([['empleados.id','=',$id]])
        ->get(); */

        // $registros =Empleado::find($id)->registros;
        
        //recorremos el intervalo para ir guardando los datos del reporte de kardex
     
        return view('reporteFaltas', compact('fechas', 'horario', 'registros','id'));
    }
}
