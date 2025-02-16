@extends('layouts.app')

@section('title', 'Detalhes do Atendimento')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detalhes do Atendimento</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Informações do Paciente -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-user-injured"></i> Informações do Paciente
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="paciente"><i class="fas fa-user"></i> Nome do Paciente</label>
                                        <p class="form-control-static">{{ $atendimento->paciente->nome }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="cpf"><i class="fas fa-id-card"></i> CPF</label>
                                        <p class="form-control-static">{{ $atendimento->paciente->cpf }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informações do Médico -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-user-md"></i> Informações do Médico
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="medico"><i class="fas fa-user-md"></i> Nome do Médico</label>
                                        <p class="form-control-static">{{ $atendimento->medico->nome }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="crm"><i class="fas fa-id-badge"></i> CRM</label>
                                        <p class="form-control-static">{{ $atendimento->medico->crm }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="especialidade"><i class="fas fa-stethoscope"></i> Especialidade</label>
                                        <p class="form-control-static">{{ $atendimento->medico->especialidade }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informações do Atendimento -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-calendar-alt"></i> Informações do Atendimento
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="data_atendimento"><i class="fas fa-clock"></i> Data do
                                            Atendimento</label>
                                        <p class="form-control-static">
                                            {{ $atendimento->data_atendimento->format('d/m/Y H:i:s') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botão de Voltar -->
                    <div class="text-center mt-4">
                        <a href="{{ route('atendimentos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar para a Lista
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
