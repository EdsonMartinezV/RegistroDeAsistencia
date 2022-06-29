<?php

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

Route::get('cardex', function() {
    return view('cardex');
});

Route::get('reporteFaltas', function() {
    return view('reporteFaltas');
});
Route::get('menu', function() {
    return view('navbar');
});

Route::post('/validar-asistencia', [RegistroController::class, 'validarAsistencia'])->name('validarAsistencia');

Route::get('/obtener-faltas', [FaltasController::class, 'obtenerFaltas'])->name('obtenerFaltas');
