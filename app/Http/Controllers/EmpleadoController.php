<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $empleado = Empleado::find($empleadoId);
        $registros = $empleado->registros()->orderBy('hora', 'asc')->get();
        $registro = $registros->first()->hora;
        $fecha = new Carbon($registro);
        $dia = $fecha->day;
        dd($fecha, EmpleadoController::$dias[$fecha->dayName]);

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
}
