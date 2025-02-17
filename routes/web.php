<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Relatorio\AtendimentosRelatorio;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('atendimentos', AtendimentoController::class);
    Route::resource('medicos', MedicoController::class);
    Route::resource('pacientes', PacienteController::class);
    Route::resource('users', UserController::class);

    Route::prefix('relatorios')->name('relatorios.')->group(function () {
        Route::get('atendimentos', [AtendimentosRelatorio::class, 'index'])->name('atendimentos.index');
        Route::get('atendimentos/medico', [AtendimentosRelatorio::class, 'show'])->name('atendimentos.show');
        Route::post('atendimentos', [AtendimentosRelatorio::class, 'store'])->name('atendimentos.store');
    });
});
