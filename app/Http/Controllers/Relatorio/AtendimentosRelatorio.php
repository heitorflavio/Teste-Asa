<?php

namespace App\Http\Controllers\Relatorio;

use App\Http\Controllers\Controller;
use App\Models\Atendimento;
use App\Models\Medico;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class AtendimentosRelatorio extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $medicos = Medico::all();
        return view('relatorios.atendimentos.index', compact('medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\Response
    {
        $request->validate([
            'inicio' => 'required|date',
            'fim' => 'required|date',
            'medico' => 'required|exists:medicos,id',
        ]);

        $inicio = Carbon::parse($request->get('inicio'));
        $fim = Carbon::parse($request->get('fim'));
        $medicoId = $request->get('medico');

        $medico = Medico::findOrFail($medicoId);

        $atendimentos = Atendimento::when($medico, function ($query, $medico) {
            return $query->where('medico_id', $medico->id);
        })->when($inicio, function ($query, $inicio) {
            return $query->where('data_atendimento', '>=', $inicio);
        })->when($fim, function ($query, $fim) {
            return $query->where('data_atendimento', '<=', $fim);
        })->orderBy('data_atendimento', 'desc')->get();


        $pdf = PDF::loadView('relatorios.atendimentos.pdf', compact('atendimentos', 'medico', 'inicio', 'fim'));
        return $pdf->download('atendimentos.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request): \Illuminate\View\View
    {
        $request->validate([
            'inicio' => 'required|date',
            'fim' => 'required|date',
            'medico' => 'required|exists:medicos,id',
        ]);

        $inicio = Carbon::parse($request->get('inicio'));
        $fim = Carbon::parse($request->get('fim'));
        $medicoId = $request->get('medico');

        $medico = Medico::findOrFail($medicoId);

        $atendimentos = Atendimento::when($medico, function ($query, $medico) {
            return $query->where('medico_id', $medico->id);
        })->when($inicio, function ($query, $inicio) {
            return $query->where('data_atendimento', '>=', $inicio);
        })->when($fim, function ($query, $fim) {
            return $query->where('data_atendimento', '<=', $fim);
        })->orderBy('data_atendimento', 'desc')->paginate(10);

        return view('relatorios.atendimentos.show', compact('atendimentos', 'medico', 'inicio', 'fim'));
    }
}
