<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaltasController extends Controller
{
    public function obtenerFaltas(Request $request){
        return redirect()->route('formularioAsistencia');
         
    }
}
