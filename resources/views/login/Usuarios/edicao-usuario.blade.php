@extends('includes.sidebar')

@section('title')
    Edição de Usuário
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Edição de cadastro de usuário</h1>
    </div>

    <div class="container">
        <form action="{{ route('edicao.update', $dados->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body card-cad">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Nome</b></label>
                            <input type="text" name="nome" class="form-control w-100" required value="{{ $dados->name }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Sobrenome</b></label>
                            <input type="text" name="sobrenome" class="form-control w-100" required value="{{ $dados->surname }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>E-mail</b></label>
                            <input type="email" name="email" required class="form-control w-100" value="{{ $dados->email }}">
                        </div>

                        <div class="col-12 col-lg-6 my-3">
                            <label class="text-muted"><b>Ocupação</b></label>
                            <select class="selectpicker w-100" name="ocupacao" required title="Informe o cargo do usuário">
                                <option {{ ($dados->occupation == 'Administrador')?'selected':'' }}>Administrador</option>
                                <option {{ ($dados->occupation == 'Vendedor')?'selected':'' }}>Vendedor</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 my-3">
                            <label class="text-muted"><b>Senha</b></label>
                            <input type="text" name="senha" class="form-control w-100" required placeholder="Insira uma nova senha.">
                        </div>

                        <div class="col-12 my-3">
                            <button type="submit" class="btn btn-info"><i class="fas fa-user-plus mr-1"></i> <b>Atualizar Registro</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
        </div>

@endsection

