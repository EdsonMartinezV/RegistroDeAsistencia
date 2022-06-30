<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
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
        return view('cardex', compact('registros'));
    }
}
