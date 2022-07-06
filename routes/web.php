<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\FaltasController;
use App\Models\Empleado;
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
    $empleados = Empleado::all();
    return view('asistencia', compact('empleados'));
})->name('formularioAsistencia');

Route::get('reporteFaltas/{id}', function($id) {
    return view('reporteFaltas', compact('id'));
})->name('faltas');

Route::post('/validar-asistencia', [RegistroController::class, 'validarAsistencia'])->name('validarAsistencia');

// Route::get('/obtener-faltas/{id}', [FaltasController::class, 'verificarPeriodo'])->name('obtenerFaltas');

Route::get('/empleados', [EmpleadoController::class, 'mostrarEmpleados'])->name('empleados');

Route::get('/empleados/crear', [EmpleadoController::class, 'crearEmpleado'])->name('crearEmpleado');

Route::post('/empleados/guardar', [EmpleadoController::class, 'guardarEmpleado'])->name('guardarEmpleado');

Route::get('/obtener-faltas/{empleadoId}', [EmpleadoController::class, 'faltas'])->name('obtenerFaltas');

Route::get('/cardex/{empleadoId}', [EmpleadoController::class, 'mostrarCardex'])->name('cardex');

Route::get('/justificantes/crear/{empleadoId}', [EmpleadoController::class, 'crearIncidencia'])->name('crearIncidencia');

Route::post('/incidencias/guardar', [EmpleadoController::class, 'guardarIncidencia'])->name('guardarIncidencia');
