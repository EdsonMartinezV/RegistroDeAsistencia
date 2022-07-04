<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Dia;
use App\Models\Incidencia;
use App\Models\Periodo;
use App\Models\Registro;
use App\Models\Incidencia;
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

    var $meses = [
        'January' => 'Enero',
        'February' => 'Febrero',
        'March' => 'Marzo',
        'April' => 'Abril',
        'May' => 'Mayo',
        'June' => 'Junio',
        'July' => 'Julio',
        'August' => 'Agosto',
        'September' => 'Septiembre',
        'October' => 'Octubre',
        'November' => 'Noviembre',
        'December' => 'Diciembre'
    ];

    public function mostrarEmpleados(){
        $empleados = Empleado::all();
        return view('empleados', compact('empleados'));
    }

    public function mostrarCardex($empleadoId) {
        date_default_timezone_set("America/Mexico_City");
        $justificantes = Empleado::find($empleadoId)->justificantes()->orderBy('fecha_inicio', 'asc')->get();
        $cardex = [];

        foreach($justificantes as $justificante) {
            $fecha = new Carbon($justificante->fecha_inicio);
            $cardex[$fecha->year][$fecha->month]['anio'] = $fecha->year;
            $cardex[$fecha->year][$fecha->month]['mes'] = $this->meses[$fecha->monthName];
            $cardex[$fecha->year][$fecha->month]['dias'][$fecha->day] = Incidencia::where('id', '=', $justificante->catalogo_de_incidencias_id)->first()->tipo;
        }

        return view('cardex', compact('cardex'));
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

        //obtención de los justificantes
        $justificantes = Empleado::find($id)->justificantes()->orderBy('fecha_inicio', 'asc')->get();


        $reporte_faltas = []; 
        $i = 0;
        //recorremos el intervalo de fechas
        foreach($fechas as $fecha){
            //guardamos el dia y fecha
            $reporte_faltas[strval($i)] = [
                'dia' => $fecha->dayName,
                'fecha' => $fecha->toDateString(),
            ];
            //Recorremos registros para guardar hora-entrada hora-salida
            foreach($registros as $registro){
                $hora = new Carbon($registro->hora);
    
                //verificamos los registros
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
                } 
            }
            //verificamos justificantes
             foreach($justificantes as $justificante){
                $inicio = new Carbon($justificante->fecha_inicio);
                $final = new Carbon($justificante->fecha_final);
                //verificamos los registros
                if($fecha->toDateString() >= $inicio->toDateString() &&  $fecha->toDateString() <= $final->toDateString()){
                    foreach($horarios as $horario){
                        if($fecha->dayOfWeek == $horario->dia_entrada){
                            $reporte_faltas[$i]['hora_entrada'] = $horario->hora_entrada . ' ' . Incidencia::where('id', '=', $justificante->catalogo_de_incidencias_id)->first()->resultante;
                        }
                    }
                } 
            }   
            $i++;
            // Incidencia::where('id', '=', $justificante->catalogo_de_incidencias_id)->first()->tipo
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
