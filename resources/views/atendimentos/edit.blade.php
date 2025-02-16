@extends('layouts.app')

@section('title', 'Editar Atendimento')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form action="{{ route('atendimentos.update', $atendimento->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Editar Atendimento</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="paciente_id"><i class="fas fa-user-injured"></i> Paciente</label>
                            <select class="form-control" id="paciente_id" name="paciente_id" required>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}"
                                        {{ $atendimento->paciente_id == $paciente->id ? 'selected' : '' }}>
                                        {{ $paciente->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="medico_id"><i class="fas fa-user-md"></i> Médico</label>
                            <select class="form-control" id="medico_id" name="medico_id" required>
                                @foreach ($medicos as $medico)
                                    <option value="{{ $medico->id }}"
                                        {{ $atendimento->medico_id == $medico->id ? 'selected' : '' }}>
                                        {{ $medico->nome }} (CRM: {{ $medico->crm }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_atendimento"><i class="fas fa-calendar-alt"></i> Data do Atendimento</label>
                            <input type="datetime-local" class="form-control" id="data_atendimento" name="data_atendimento"
                                value="{{ $atendimento->data_atendimento->format('Y-m-d\TH:i') }}" required>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('atendimentos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Atualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
