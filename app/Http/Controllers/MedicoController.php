<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use App\Models\Medico;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\View\View
    {
        $medicos = Medico::orderBy('created_at', 'desc')->paginate(10);
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\View\View
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicoRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            Medico::create($request->validated());
            return redirect()->route('medicos.index')->with('success', 'Médico criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('medicos.index')->with('error', 'Erro ao criar médico!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico): \Illuminate\View\View
    {
        return view('medicos.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico): \Illuminate\View\View
    {
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicoRequest $request, Medico $medico): \Illuminate\Http\RedirectResponse
    {
        try {
            $medico->update($request->validated());
            return redirect()->route('medicos.index')->with('success', 'Médico atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('medicos.index')->with('error', 'Erro ao atualizar médico!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico): \Illuminate\Http\RedirectResponse
    {
        try {
            $medico->delete();
            return redirect()->route('medicos.index')->with('success', 'Médico deletado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('medicos.index')->with('error', 'Erro ao deletar médico!');
        }
    }
}
