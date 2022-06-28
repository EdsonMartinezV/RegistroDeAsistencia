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

    public function mostrarEmpleado($empleadoId){
        $empleado = Empleado::find($empleadoId);
        return view('empleado', compact('empleado'));
    }
}
