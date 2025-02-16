<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;
use App\Models\Atendimento;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\View\View
    {
        $atendimentos = Atendimento::paginate(10);
        return view('atendimentos.index', compact('atendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\View\View
    {
        return view('atendimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAtendimentoRequest $request): \Illuminate\Http\RedirectResponse
    {
        Atendimento::create($request->validated());
        return redirect()->route('atendimentos.index');
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
        return view('atendimentos.edit', compact('atendimento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAtendimentoRequest $request, Atendimento $atendimento): \Illuminate\Http\RedirectResponse
    {
        $atendimento->update($request->validated());
        return redirect()->route('atendimentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendimento $atendimento): \Illuminate\Http\RedirectResponse
    {
        $atendimento->delete();
        return redirect()->route('atendimentos.index');
    }
}
