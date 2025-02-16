@extends('layouts.app')

@section('title', 'Atendimentos')

@section('content')
    <!-- Lista de Atendimentos -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Atendimentos</h6>
                    <a href="{{ route('atendimentos.create') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Adicionar Atendimento
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Paciente</th>
                                    <th class="text-nowrap">Médico</th>
                                    <th class="text-nowrap">Crm do Médico</th>
                                    <th class="text-nowrap">Especialidade</th>
                                    <th class="text-nowrap">Data do Atendimento</th>
                                    <th class="text-nowrap">Criado em</th>
                                    <th class="text-nowrap">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atendimentos as $atendimento)
                                    <tr>
                                        <td class="text-nowrap">{{ $atendimento->paciente->nome }}</td>
                                        <td class="text-nowrap">{{ $atendimento->medico->nome }}</td>
                                        <td class="text-nowrap">{{ $atendimento->medico->crm }}</td>
                                        <td class="text-nowrap">{{ $atendimento->medico->especialidade }}</td>
                                        <td class="text-nowrap">{{ $atendimento->data_atendimento->format('d/m/Y H:i:s') }}
                                            <td class="text-nowrap">{{ $atendimento->created_at->format('d/m/Y H:i:s') }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('atendimentos.show', $atendimento->id) }}"
                                                    class="btn btn-sm btn-secondary mr-2">Detalhes</a>
                                                <a href="{{ route('atendimentos.edit', $atendimento->id) }}"
                                                    class="btn btn-sm btn-primary mr-2">Editar</a>
                                                <form action="{{ route('atendimentos.destroy', $atendimento->id) }}"
                                                    method="POST" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $atendimentos->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
