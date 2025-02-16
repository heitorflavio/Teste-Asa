<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('atendimentos', AtendimentoController::class);
Route::resource('medicos', MedicoController::class);
Route::resource('pacientes', PacienteController::class);
Route::get('/dashboard', DashboardController::class)->name('dashboard');
