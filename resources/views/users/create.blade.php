@extends('layouts.app')

@section('title', 'Adicionar Usuário')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Adicionar Usuário</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"><i class="fas fa-user"></i> Nome</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock"></i> Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation"><i class="fas fa-lock"></i> Confirmar Senha</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
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
