@extends('includes.sidebar')

@section('title')
    Novo Funcionário
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Novo Funcionário</h1>
    </div>

    @if(session('msg'))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><b>{{ session('msg') }}</b></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

<div class="container">
    <form action="{{ route('administracao.store') }}" method="post" class="form-group">
        @csrf
        <div class="card">
            <div class="card-body card-cad">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Nome:</b><span class="text-danger"> *</span></label>
                        <input type="text" class="form-control w-100" name="nome" placeholder="Digite o nome completo" required>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Endereço:</b><span class="text-danger"> *</span></label>
                        <input type="text" class="form-control w-100" name="endereco" required>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>RG:</b><span class="text-danger"> *</span></label>
                        <input type="number" class="form-control w-100" name="rg" required>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>CPF:</b><span class="text-danger"> *</span></label>
                        <input type="number" class="form-control w-100" name="cpf" required>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Telefone:</b><span class="text-danger"> *</span></label>
                        <input type="tel" class="form-control w-100" name="telefone" placeholder="Insira o telefone com DDD" required>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Telefone Secundário:</b></label>
                        <input type="tel" class="form-control w-100" name="telefone_sec">
                    </div>

                    <div class="col-12 col-lg-6 my-3">
                        <label class="text-muted"><b>E-mail:</b></label>
                        <input type="email" class="form-control w-100" name="email">
                    </div>

                    <div class="col-12 col-lg-6 my-3">
                        <label class="text-muted"><b>Ocupação:</b><span class="text-danger"> *</span></label>
                        <select class="selectpicker w-100" title="Informe o cargo" name="cargo" required>
                            <option>Administrador(a)</option>
                            <option>Vendedor(a)</option>
                            <option>Recepcionista</option>
                            <option>Faxineiro(a)</option>
                            <option>Digital Maker</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-info my-3"><i class="fas fa-user-plus"></i>&nbsp; <b>Cadastrar Funcionário</b></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection
