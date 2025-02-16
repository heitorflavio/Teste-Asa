<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Atendimento;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $medicos = Medico::count();
        $pacientes = Paciente::count();
        $atendimentos = Atendimento::count();
        $users = User::count();

        return view('dashboard', compact('medicos', 'pacientes', 'atendimentos', 'users'));
    }
}
