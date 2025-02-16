@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
    <!-- Lista de Médicos -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de Usuários</h6>
                    <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Adicionar Usuário
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Nome</th>
                                    <th class="text-nowrap">Email</th>
                                    <th class="text-nowrap">Criado em</th>
                                    <th class="text-nowrap">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-nowrap">{{ $user->name }}</td>
                                        <td class="text-nowrap">{{ $user->email }}</td>
                                        <td class="text-nowrap">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="btn btn-sm btn-secondary mr-2">Detalhes</a>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-sm btn-primary mr-2">Editar</a>
                                                @if ($user->id !== auth()->user()->id)
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        class="delete" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Excluir</button>
                                                    </form>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        disabled>Excluir</button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
