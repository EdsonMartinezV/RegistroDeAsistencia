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

<<<<<<< HEAD
Route::get('/cardex', function() {
=======
Route::get('cardex/{id}', function() {
>>>>>>> 1eca90c43e5759e78e622f7e689086ddd6590b7f
    return view('cardex');
})->name('cardex');

Route::get('reporteFaltas/{id}', function($id) {
    return view('reporteFaltas',compact('id'));
})->name('faltas');

Route::get('/reporteFaltas', function() {
    return view('reporteFaltas');
<<<<<<< HEAD
});
Route::get('/menu', function() { 
=======
})->name('faltasDatos');

Route::get('menu', function() {
>>>>>>> 1eca90c43e5759e78e622f7e689086ddd6590b7f
    return view('navbar');
});

Route::post('/validar-asistencia', [RegistroController::class, 'validarAsistencia'])->name('validarAsistencia');

Route::get('/obtener-faltas/{id}', [FaltasController::class, 'verificarPeriodo'])->name('obtenerFaltas');
Route::get('/empleados', [EmpleadoController::class, 'mostrarEmpleados'])->name('empleados');

<<<<<<< HEAD
Route::get('/cardex/{empleadoId}', [EmpleadoController::class, 'mostrarCardex'])->name('cardex');

Route::get('/faltas/{empleadoId}', [EmpleadoController::class, 'mostrarFaltas'])->name('faltas');

Route::get('/obtener-faltas', [RegistroController::class, 'validarAsistencia'])->name('validarAsistencia');
=======
Route::get('/empleados/{empleadoId}', [EmpleadoController::class, 'mostrarEmpleado'])->name('empleado');

>>>>>>> 1eca90c43e5759e78e622f7e689086ddd6590b7f
