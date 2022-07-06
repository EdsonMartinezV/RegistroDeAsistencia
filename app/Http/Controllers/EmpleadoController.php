<?php

namespace App\Http\Controllers;

use App\Models\Clues;
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

    public function crearEmpleado(){
        $clues = Clues::all();
        return view('crearEmpleado', compact('clues'));
    }

    public function guardarEmpleado(Request $request){
        Empleado::create(
            $request->all()
        );
        return redirect()->route('empleados');
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

        //obtener un intervalo que se puede recorrer entre las fechas que se requiere
        $inicio = new Carbon($request->inicio);
        $final = new Carbon($request->Termino);
        $intervalo = DateInterval::createFromDateString('1 day');
        $fechas = new DatePeriod($inicio, $intervalo, $final);

        //obtencion de los registros entre las fechas que se requieren
        $registros = Empleado::find($id)
            ->registros()
            ->whereBetween('hora', [$request->inicio, $request->Termino])
            ->orderBy('hora', 'asc')
            ->get();
        
        //obtención de los dias de los periodos del empleado y catalogo horas de entrada/salida
        $horarios = Empleado::find($id)
            ->join('periodos','empleados.id', '=', 'periodos.empleado_id')
            ->where('periodos.empleado_id','=',$id)
            ->join('dias','periodos.id', '=', 'dias.periodo_id')
            ->join('catalogo_de_horarios','dias.catalogo_de_horarios_id', '=', 'catalogo_de_horarios.id')
            ->get(); 

        //obtención de los justificantes
        $justificantes = Empleado::find($id)->justificantes()->orderBy('fecha_inicio', 'asc')->get();


        $reporte_faltas = []; 
        $i = 0;
        //recorremos el intervalo de fechas
        foreach($fechas as $fecha){// Validar periodo activo dentro de la fecha a evaluar
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
                            // $horario->dia_entrada = new Carbon($horario->hora_inicio_checada_entrada);
                            if($hora->toTimeString()>=$horario->hora_inicio_checada_entrada && $hora->toTimeString()<=$horario->hora_fin_checada_entrada ){
                                $reporte_faltas[$i]['hora_entrada'] = $hora->toTimeString();
                            }
                           /*  if($hora->toTimeString() < $horario->hora_inicio_checada_entrada || $hora->toTimeString() > $horario->hora_fin_checada_entrada){
                                $reporte_faltas[$i]['hora_entrada'] = 'sin registro';
                            } */
    
                        }// Verificar con dia de salida distinto a dia de entrada
                        if($hora->dayOfWeek == $horario->dia_salida){
                            if($hora->toTimeString()>=$horario->hora_inicio_checada_salida && $hora->toTimeString()<=$horario->hora_fin_checada_salida ){
                                $reporte_faltas[$i]['hora_salida'] = $hora->toTimeString();
                            }
                        }
                    }  
                } 
            }
            //verificamos justificantes
             foreach($justificantes as $justificante){// Pasar foreach's a funciones que retornen el resultado
                $inicio = new Carbon($justificante->fecha_inicio);
                $final = new Carbon($justificante->fecha_final);
                //verificamos los registros
                if($fecha->toDateString() >= $inicio->toDateString() &&  $fecha->toDateString() <= $final->toDateString()){
                    foreach($horarios as $horario){
                        if($fecha->dayOfWeek == $horario->dia_entrada){
                            $reporte_faltas[$i]['hora_entrada'] = $horario->hora_entrada . ' ' . Incidencia::where('id', '=', $justificante->catalogo_de_incidencias_id)->first()->resultante;
                        }// Usar diferencia numerica de dias
                        if($fecha->dayOfWeek == $horario->dia_salida){
                            $reporte_faltas[$i]['hora_salida'] = $horario->hora_salida . ' ' . Incidencia::where('id', '=', $justificante->catalogo_de_incidencias_id)->first()->resultante;
                        }
                    }
                } 
            }   
            $i++;   
        }
        dd($reporte_faltas);
     
        return view('reporteFaltas', compact('fechas', 'horario', 'registros','id'));
    }
}
