<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Empleado;
use App\Models\Periodo;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function validarAsistencia(Request $request){
        $request->validate([
            'empleado_id' => 'required',
            'hora' => 'required'
        ]);
        return $this->crearRegistro($request);
    }

    public function crearRegistro($request){
        date_default_timezone_set("America/Mexico_City");
        $time = new Carbon($request->hora);
        Registro::create([
            'empleado_id' => $request->empleado_id,
            'hora' => $time,
        ]);
        return redirect()->route('formularioAsistencia');
    }
}
