@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
    <!-- Lista de Pacientes -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Pacientes</h6>
                    <a href="{{ route('pacientes.create') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Adicionar Paciente
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Nome</th>
                                    <th class="text-nowrap">Email</th>
                                    <th class="text-nowrap">CPF</th>
                                    <th class="text-nowrap">Data de Nascimento</th>
                                    <th class="text-nowrap">Criado em</th>
                                    <th class="text-nowrap">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pacientes as $paciente)
                                    <tr>
                                        <td class="text-nowrap">{{ $paciente->nome }}</td>
                                        <td class="text-nowrap">{{ $paciente->email }}</td>
                                        <td class="text-nowrap">{{ $paciente->cpf }}</td>
                                        <td class="text-nowrap">{{ $paciente->data_nascimento }}</td>
                                        <td class="text-nowrap">{{ $paciente->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('pacientes.show', $paciente->id) }}"
                                                    class="btn btn-sm btn-secondary mr-2">Detalhes</a>
                                                <a href="{{ route('pacientes.edit', $paciente->id) }}"
                                                    class="btn btn-sm btn-primary mr-2">Editar</a>
                                                <form action="{{ route('pacientes.destroy', $paciente->id) }}" class="delete"
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
                    {{ $pacientes->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
