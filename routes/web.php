<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\FaltasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('asistencia');
})->name('formularioAsistencia');

Route::get('cardex/{id}', function() {
    return view('cardex');
})->name('cardex');

Route::get('reporteFaltas/{id}', function($id) {
    return view('reporteFaltas',compact('id'));
})->name('faltas');

Route::post('/validar-asistencia', [RegistroController::class, 'validarAsistencia'])->name('validarAsistencia');

// Route::get('/obtener-faltas/{id}', [FaltasController::class, 'verificarPeriodo'])->name('obtenerFaltas');

Route::get('/empleados', [EmpleadoController::class, 'mostrarEmpleados'])->name('empleados');

Route::get('/obtener-faltas/{id}', [EmpleadoController::class, 'faltas'])->name('obtenerFaltas');

Route::get('/cardex/{empleadoId}', [EmpleadoController::class, 'mostrarCardex'])->name('cardex');

