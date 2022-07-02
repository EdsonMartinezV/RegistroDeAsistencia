<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Dia;
use App\Models\Periodo;
use DateTime;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function mostrarEmpleados(){
        $empleados = Empleado::all();
        return view('empleados', compact('empleados'));
    }

    public function mostrarCardex($empleadoId) {
        $empleado = Empleado::find($empleadoId);
        $registros = $empleado->registros()->orderBy('hora', 'asc')->get();
        $registro = $registros->first()->hora;
        $fecha = new DateTime($registro);
        return view('cardex', compact('registros', 'registro', 'fecha'));
    }

    public function Faltas(Request $request, $id) {
        // $Periodo = Empleado::find($id)->dias;
         /*$Periodo = Empleado::find(1)->whereHas('dias', function($query) {
            $query->whereHas('horarios', function($qry) {
                $qry->get();
            });
        });*/
        // dd($Periodo);
        $registros = Empleado::find($id)->registros;

        $reportes_faltas = Empleado::join('periodos','empleados.id', '=', 'periodos.empleado_id')
        -> join('dias','periodos.id', '=', 'dias.periodo_id')
        -> join('catalogo_de_horarios','dias.catalogo_de_horarios_id', '=', 'catalogo_de_horarios.id')
        -> where ([['empleados.id','=',$id]])
        ->get();
        dd($reportes_faltas);
        return view('cardex', compact('registros', 'registro', 'fecha'));
    }
}
