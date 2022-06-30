<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
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
}
