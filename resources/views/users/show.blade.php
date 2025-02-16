@extends('layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detalhes do Usuário</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Informações Básicas -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-user-circle"></i> Informações Básicas
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name"><i class="fas fa-user"></i> Nome</label>
                                        <p class="form-control-static">{{ $user->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><i class="fas fa-envelope"></i> Email</label>
                                        <p class="form-control-static">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informações Adicionais -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-calendar-alt"></i> Informações Adicionais
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="created_at"><i class="fas fa-clock"></i> Criado em</label>
                                        <p class="form-control-static">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botão de Voltar -->
                    <div class="text-center mt-4">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar para a Lista
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
