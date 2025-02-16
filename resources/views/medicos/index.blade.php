@extends('layouts.app')

@section('title', 'Médicos')

@section('content')
    <!-- Lista de Médicos -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Médicos</h6>
                    <a href="{{ route('medicos.create') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Adicionar Médico
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Nome</th>
                                    <th class="text-nowrap">Crm</th>
                                    <th class="text-nowrap">Especialidade</th>
                                    <th class="text-nowrap">Criado em</th>
                                    <th class="text-nowrap">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicos as $medico)
                                    <tr>
                                        <td class="text-nowrap">{{ $medico->nome }}</td>
                                        <td class="text-nowrap">{{ $medico->crm }}</td>
                                        <td class="text-nowrap">{{ $medico->especialidade }}</td>
                                        <td class="text-nowrap">{{ $medico->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('medicos.show', $medico->id) }}"
                                                    class="btn btn-sm btn-secondary mr-2">Detalhes</a>
                                                <a href="{{ route('medicos.edit', $medico->id) }}"
                                                    class="btn btn-sm btn-primary mr-2">Editar</a>
                                                <form action="{{ route('medicos.destroy', $medico->id) }}"
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
                    {{ $medicos->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
