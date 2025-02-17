<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Atendimento;
use App\Models\User;
use Carbon\Carbon;

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

        $today = Carbon::today();
        $start = $today->copy()->subDays(60);
        $end = $today->copy()->addDays(60);
        $agenda = Atendimento::whereBetween('data_atendimento', [$start, $end])->get();

        return view('dashboard', compact('medicos', 'pacientes', 'atendimentos', 'users', 'agenda'));
    }
}
