<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Dia;
use App\Models\Incidencia;
use App\Models\Periodo;
use App\Models\Registro;
use DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DatePeriod;
use DateInterval;

class EmpleadoController extends Controller
{
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
        $dias = [
            'Monday' => 'Lunes',
            'Thursday' => 'Martes',
            'Wednesday' => 'Miercoles',
            'Tuesday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sabado',
            'Sunday' => 'Domingo'
        ];
        $empleado = Empleado::find($empleadoId);
        $justificantes = $empleado->justificantes()->orderBy('fecha_inicio', 'asc')->get();
        /* $justificante = $justificantes->first();
        $fecha = new Carbon($justificante->fecha_inicio); */

        $cardex = [];
        foreach($justificantes as $justificante) {
            $fecha = new Carbon($justificante->fecha_inicio);
            $cardex[$fecha->year][$fecha->monthName][$fecha->day] = [Incidencia::where('id', '=', $justificante->catalogo_de_incidencias_id)->first()->tipo];
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
        $horario = Empleado::find($id)
        ->join('periodos','empleados.id', '=', 'periodos.empleado_id')->where('periodos.empleado_id','=',$id)
        -> join('dias','periodos.id', '=', 'dias.periodo_id')
        -> join('catalogo_de_horarios','dias.catalogo_de_horarios_id', '=', 'catalogo_de_horarios.id')
        ->get(); 

        $reporte_faltas = []; 
        $i = 0;
        //recorremos el intervalo de fechas
        foreach($fechas as $fecha){
            //guardamos el dia y fecha
            $reporte_faltas[strval($i+1)] = [
                'dia' => $fecha->dayName,
                'fecha' => $fecha->toDateString(),
            ];
            //guardamos el registro falta guardar sin borrar checar si funciona push
            foreach($registros as $registro){
                $hora = new Carbon($registro->hora);
                if($hora->toDateString() == $fecha->toDateString()){
                    $reporte_faltas[$i+1]['hora_entrada'] = $registro->hora;
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
