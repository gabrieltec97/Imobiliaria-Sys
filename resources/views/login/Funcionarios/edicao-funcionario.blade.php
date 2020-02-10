@extends('includes.sidebar')

@section('title')
    Edição de dados do Funcionário
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Edição de cadastro de funcionário</h1>
    </div>

    @if(!empty($situacao))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><b>Dados cadastrais alterados com sucesso!</b></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    <div class="container conteudo_cad">
        <form action="{{ route('administracao.update', $funcionario->id) }}" method="post" class="form-group">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body card-cad">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Nome:</b><span class="text-danger"> *</span></label>
                            <input type="text" class="form-control w-100" name="nome" value="{{ $funcionario->nome }}" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Endereço:</b><span class="text-danger"> *</span></label>
                            <input type="text" class="form-control w-100" name="endereco" value="{{ $funcionario->endereco }}" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>RG:</b><span class="text-danger"> *</span></label>
                            <input type="number" class="form-control w-100" name="rg" value="{{ $funcionario->rg }}" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>CPF:</b><span class="text-danger"> *</span></label>
                            <input type="number" class="form-control w-100" name="cpf" value="{{ $funcionario->cpf }}" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Telefone:</b><span class="text-danger"> *</span></label>
                            <input type="tel" class="form-control w-100" name="telefone" value="{{ $funcionario->telefone }}" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Telefone Secundário:</b></label>
                            <input type="tel" class="form-control w-100" name="telefone_sec" value="{{ $funcionario->telefone_op }}">
                        </div>

                        <div class="col-12 col-lg-6 my-3">
                            <label class="text-muted"><b>E-mail:</b></label>
                            <input type="email" class="form-control w-100" name="email" value="{{ $funcionario->email }}">
                        </div>

                        <div class="col-12 col-lg-6 my-3">
                            <label class="text-muted"><b>Ocupação:</b><span class="text-danger"> *</span></label>
                            <select class="selectpicker w-100" title="Informe o cargo" name="cargo" required>
                                <option {{ ($funcionario->cargo == 'Administrador')?'selected':'' }}>Administrador(a)</option>
                                <option {{ ($funcionario->cargo == 'Vendedor(a)')?'selected':'' }}>Vendedor(a)</option>
                                <option {{ ($funcionario->cargo == 'Recepcionista')?'selected':'' }}>Recepcionista</option>
                                <option {{ ($funcionario->cargo == 'Faxineiro(a)')?'selected':'' }}>Faxineiro(a)</option>
                                <option {{ ($funcionario->cargo == 'Digital Maker')?'selected':'' }}>Digital Maker</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-info my-3"><i class="fas fa-user-plus"></i>&nbsp; <b>Alterar Cadastro</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if(!empty($situacao))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><b>Dados cadastrais alterados com sucesso!</b></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
@endsection
