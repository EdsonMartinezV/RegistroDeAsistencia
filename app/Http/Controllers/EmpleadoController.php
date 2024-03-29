<?php

namespace App\Http\Controllers;

use App\Models\Clues;
use App\Models\Empleado;
use App\Models\Dia;
use App\Models\Incidencia;
use App\Models\Justificante;
use App\Models\Periodo;
use App\Models\Registro;
use DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use DatePeriod;
use DateInterval;
use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Boolean;

class EmpleadoController extends Controller
{
    var $dias = [
        'Monday' => 'Lunes',
        'Tuesday' => 'Martes',
        'Wednesday' => 'Miercoles',
        'Thursday' => 'Jueves',
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

    public function crearIncidencia($empleadoId){
        $incidencias = Incidencia::all();
        return view('crearIncidencia', compact('empleadoId', 'incidencias'));
    }

    public function guardarIncidencia(Request $request){
        Justificante::create(
            $request->all()
        );
        return redirect()->route('empleados');
    }

    public function mostrarCardex($empleadoId) {
        date_default_timezone_set("America/Mexico_City");
        $justificantes = Empleado::find($empleadoId)->justificantes()->orderBy('fecha_inicio', 'asc')->get();
        $cardex = [];
        // dd($justificantes);
        $empleado = Empleado::find($empleadoId);
        /* $inicio = new Carbon($justificantes->first()->fecha_inicio);
        $termino = new Carbon($justificantes->last()->fecha_inicio); */
        $inicio = new Carbon('first day of January' . Carbon::now()->year);
        $termino = new Carbon('last day of December' . Carbon::now()->year);
        $this->obtenerFaltas($empleado, $inicio, $termino, false);

        foreach($justificantes as $justificante) {
            $fecha = new Carbon($justificante->fecha_inicio);
            $cardex[$fecha->year][$fecha->month]['anio'] = $fecha->year;
            $cardex[$fecha->year][$fecha->month]['mes'] = $this->meses[$fecha->monthName];
            $cardex[$fecha->year][$fecha->month]['dias'][$fecha->day] = Incidencia::where('id', '=', $justificante->catalogo_de_incidencias_id)->first()->tipo;
        }

        return view('cardex', compact('cardex'));
    }

    public function reporteFaltas(Request $request, $empleadoId){
        $empleado = Empleado::find($empleadoId);
        $inicio = new Carbon($request->inicio);
        $termino = new Carbon($request->termino);
        $faltas = $this->obtenerFaltas($empleado, $inicio, $termino, true);
        // dd($faltas);
        return view ('reporteFaltas', compact('faltas', 'empleadoId'));
    }

    public function obtenerFaltas($empleado, $inicio, $termino, $enviarReporte){
        $intervalo = CarbonInterval::createFromDateString('1 day');
        $fechas = new CarbonPeriod($inicio, $intervalo, $termino);

        $registros = $empleado->registros()
            ->whereBetween('hora', [$inicio, $termino])
            ->orderBy('hora', 'asc')
            ->get();

        $periodos = $empleado->periodos()
            ->where(function (Builder $query) use ($inicio, $termino) {
                $query->whereBetween('inicio_periodo_laboral', [$inicio, $termino])
                    ->orWhereBetween('fin_periodo_laboral', [$inicio, $termino])
                    ->orWhere(function (Builder $query) use ($inicio, $termino) {
                        $query->where('inicio_periodo_laboral', '<', $inicio)
                            ->where('fin_periodo_laboral', '>', $termino);
                        });
            })->get();

        $faltas = [];
        $i = 0;
        foreach($fechas as $fecha) {
            $faltas[$i]  = [
                'dia' => $this->dias[$fecha->dayName],
                'fecha' => $fecha->toDateString(),
            ];
            foreach($registros as $registro) {
                // dd($registros);
                $carbonHora = new Carbon($registro->hora);
                // dd($carbonHora->toDateString() == $fecha->toDateString());
                if ($carbonHora->toDateString() == $fecha->toDateString()) {
                    foreach ($periodos as $periodo) {
                        if($carbonHora->betweenIncluded($periodo->inicio_periodo_laboral, $periodo->fin_periodo_laboral)) {
                            foreach ($periodo->horarios as $horario) {
                                if($carbonHora->dayOfWeek == $horario->pivot->dia_entrada){
                                    $carbonInicio_checada_entrada = new Carbon($horario->hora_inicio_checada_entrada);
                                    $carbonFin_checada_entrada = new Carbon($horario->hora_fin_checada_entrada);
                                    $carbonInicio_checada_salida = new Carbon($horario->hora_inicio_checada_salida);
                                    $carbonFin_checada_salida = new Carbon($horario->hora_fin_checada_salida);
                                    $carbonTimeHora = new Carbon($carbonHora->toTimeString());
                                    $carbonTimeHoraEsteSi = new Carbon($carbonTimeHora);

                                    if(empty($faltas[$i]['hora_entrada'])){
                                        if($carbonTimeHoraEsteSi->gte($carbonInicio_checada_entrada) and $carbonTimeHoraEsteSi->lte($carbonFin_checada_entrada)){
                                            $faltas[$i]['hora_entrada'] =  $carbonTimeHora->toTimeString();
                                        }
                                    }
                                    if(empty($faltas[$i]['hora_salida'])){
                                        if($carbonHora->dayOfWeek == $horario->pivot->dia_entrada){
                                            if($carbonTimeHoraEsteSi->gte($carbonInicio_checada_salida) and $carbonTimeHoraEsteSi->lte($carbonFin_checada_salida)){
                                                $faltas[$i]['hora_salida'] = $carbonTimeHora->toTimeString();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if(Justificante::where('empleado_id', '=', $empleado->id)->where('fecha_inicio', '=', $fecha->toDateString())->exists()){
                
            }
            if(empty($faltas[$i]['hora_entrada']) || empty($faltas[$i]['hora_salida'])){
                if(!Justificante::where('empleado_id', '=', $empleado->id)
                        ->where('fecha_inicio', '=', $fecha->toDateString())
                        ->where('catalogo_de_incidencias_id', '=', 1)
                        ->exists()){
                    Justificante::create([
                        'fecha_inicio' => $fecha->toDateString(),
                        'horario' => 'Matutino',
                        'num_memorandum' => random_int(1, 1000),
                        'empleado_id' => $empleado->id,
                        'catalogo_de_incidencias_id' => 1,
                    ]);
                }
                if(empty($faltas[$i]['hora_entrada'])){
                    $faltas[$i]['hora_entrada'] = 'sin registro';
                }
                if(empty($faltas[$i]['hora_salida'])){
                    $faltas[$i]['hora_salida'] = 'sin registro';
                }
            }
            $i++;
        }
        if($enviarReporte){
            return $faltas;
        }
    }

    /* public function Faltas(Request $request, $empleadoId) {

        //obtener un intervalo que se puede recorrer entre las fechas que se requiere
        $inicio = new Carbon($request->inicio);
        $final = new Carbon($request->termino);
        $intervalo = DateInterval::createFromDateString('1 day');
        $fechas = new DatePeriod($inicio, $intervalo, $final);

        //obtencion de los registros entre las fechas que se requieren
        $registros = Empleado::find($empleadoId)
            ->registros()
            ->whereBetween('hora', [$request->inicio, $request->termino])
            ->orderBy('hora', 'asc')
            ->get();
        
        //obtención de los dias de los periodos del empleado y catalogo horas de entrada
        $horarios = Empleado::find($empleadoId)
            ->join('periodos','empleados.id', '=', 'periodos.empleado_id')
            ->where('periodos.empleado_id','=',$empleadoId)
            ->join('dias','periodos.id', '=', 'dias.periodo_id')
            ->join('catalogo_de_horarios','dias.catalogo_de_horarios_id', '=', 'catalogo_de_horarios.id')
            ->get(); 

        //obtención de los justificantes
        $justificantes = Empleado::find($empleadoId)->justificantes()->orderBy('fecha_inicio', 'asc')->get();


        $reporte_tdfaltas = []; 
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
                    $j=0;
                  
                    foreach($horarios as $horario){
                        if($hora->dayOfWeek == $horario->dia_entrada){
                            $hora_inicio_checada_entrada = new Carbon($horario->hora_inicio_checada_entrada);
                            $hora_fin_checada_entrada = new Carbon($horario->hora_fin_checada_entrada);
                            $hora_inicio_checada_salida = new Carbon($horario->hora_inicio_checada_salida);
                            $hora_fin_checada_salida = new Carbon($horario->hora_fin_checada_salida);
                            // $hora_inicio_checada_entrada = Carbon::createFromFormat('Y-m-d H:i:s', $hora_inicio_checada_entrada)->format('H:i:s');
                            $hora_registro= new Carbon($hora->toTimeString());
                
                            // dd($hora_registro->gte($hora_inicio_checada_entrada) and $hora_registro->lte($hora_fin_checada_entrada));
                            if(empty($reporte_faltas[$j]['hora_entrada'])){
                                if($hora_registro->gte($hora_inicio_checada_entrada) and $hora_registro->lte($hora_fin_checada_entrada) ){
                                    $reporte_faltas[$j]['hora_entrada'] = $hora->toTimeString();
                                }
                        }
                       
                            if(empty($reporte_faltas[$j]['hora_salida'])){
                                if($hora->dayOfWeek == $horario->dia_salida){
                                    if($hora_registro->gte($hora_inicio_checada_salida) and $hora_registro->lte($hora_fin_checada_salida) ){
                                        $reporte_faltas[$i]['hora_salida'] = $hora->toTimeString();
                                    }
                                }
                            }
                    }
                    if($hora->dayOfWeek != $horario->dia_entrada){
                        if(empty($reporte_faltas[$j]['hora_salida'])){
                            $reporte_faltas[$j]['hora_salida'] = 'sin registro';
                        }
                        if(empty($reporte_faltas[$j]['hora_entrada'])){
                            $reporte_faltas[$j]['hora_entrada'] = 'sin registro';
                        }
                    }
                    
                        $j++;
                    }
                    // dd($j);  
                } 
            }
            //verificamos justificantes
             foreach($justificantes as $justificante){// Pasar foreach's a funciones que retornen el resultado
                $inicio = new Carbon($justificante->fecha_inicio);
                $final = new Carbon($justificante->fecha_final);
                //verificamos los registros
                if($fecha->toDateString() >= $inicio->toDateString() and  $fecha->toDateString() <= $final->toDateString()){
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
     
        return view('reporteFaltas', compact('fechas', 'horario', 'registros','id'));
    } */
}
