@extends('layouts.app')

@section('title', 'Relatório de Atendimentos')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form action="{{ route('relatorios.atendimentos.show') }}" method="GET">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="medico"><i class="fas fa-user-md"></i> Médico</label>
                                    <select class="form-control" id="medico" name="medico" required>
                                        <option value="">Selecione um médico</option>
                                        @foreach ($medicos as $medico)
                                            <option value="{{ $medico->id }}">{{ $medico->nome }} - (CMR:
                                                {{ $medico->crm }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="inicio"><i class="fas fa-id-badge"></i> Data de Início</label>
                                    <input type="datetime" class="form-control" id="inicio" name="inicio"
                                        value="{{ old('inicio', date('Y-m-d' . ' 00:00:00')) }}" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="fim"><i class="fas fa-id-badge"></i> Data de Fim</label>
                                    <input type="datetime" class="form-control" id="fim" name="fim"
                                        value="{{ old('fim', date('Y-m-d' . ' 23:59:59')) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-times mx-2"></i>Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mx-2"></i>Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
