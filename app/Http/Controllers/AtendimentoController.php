<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;
use App\Models\Atendimento;
use App\Models\Medico;
use App\Models\Paciente;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\View\View
    {
        $atendimentos = Atendimento::orderBy('created_at', 'desc')->paginate(10);
        return view('atendimentos.index', compact('atendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\View\View
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('atendimentos.create', compact('pacientes', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAtendimentoRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            Atendimento::create($request->validated());
            return redirect()->route('atendimentos.index')->with('success', 'Atendimento criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('atendimentos.index')->with('error', 'Erro ao criar atendimento!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Atendimento $atendimento): \Illuminate\View\View
    {
        return view('atendimentos.show', compact('atendimento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendimento $atendimento): \Illuminate\View\View
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('atendimentos.edit', compact('atendimento', 'pacientes', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAtendimentoRequest $request, Atendimento $atendimento): \Illuminate\Http\RedirectResponse
    {
        try {
            $atendimento->update($request->validated());
            return redirect()->route('atendimentos.index')->with('success', 'Atendimento atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('atendimentos.index')->with('error', 'Erro ao atualizar atendimento!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendimento $atendimento): \Illuminate\Http\RedirectResponse
    {
        try {
            $atendimento->delete();
            return redirect()->route('atendimentos.index')->with('success', 'Atendimento deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('atendimentos.index')->with('error', 'Erro ao deletar atendimento!');
        }
    }
}
