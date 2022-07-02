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
       /*  $Periodo = Empleado::find(1)->whereHas('dias', function($query) {
            $query->whereHas('horarios', function($qry) {
                $qry->get();
            });
        });
        dd($Periodo); */
        $Periodo = Empleado::find($id)->dias;
        dd($Periodo);
        return view('cardex', compact('registros', 'registro', 'fecha'));
    }
}
