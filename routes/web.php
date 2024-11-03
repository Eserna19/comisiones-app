<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComisionController;


Route::get('/', function () {
    return view('welcome');
});

// Ruta para mostrar la interfaz de la calculadora
Route::get('/comisiones', [ComisionController::class, 'index'])->name('comisiones.index');

// Ruta para calcular la comisión
Route::post('/calcular-comision', [ComisionController::class, 'calcular'])->name('calcular.comision');