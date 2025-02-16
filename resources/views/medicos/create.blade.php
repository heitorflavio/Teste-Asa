@extends('layouts.app')

@section('title', 'Adicionar Médico')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form action="{{ route('medicos.store') }}" method="POST">
                    @csrf
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Adicionar Médico</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nome"><i class="fas fa-user"></i> Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="crm"><i class="fas fa-id-badge"></i> CRM</label>
                            <input type="text" class="form-control" id="crm" name="crm" required>
                        </div>
                        <div class="form-group">
                            <label for="especialidade"><i class="fas fa-stethoscope"></i> Especialidade</label>
                            <input type="text" class="form-control" id="especialidade" name="especialidade" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('medicos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
