@extends('includes.sidebar')

@section('title')
    Dados do Funcionário
@endsection

@section('content')
    <div class="container conteudo_cad">
            <div class="row mt-4">
                <div class="col-12 col-lg-6 col-xl-4 my-3">
                    <label class="text-muted"><b>Nome:</b></label>
                    <input type="text" class="form-control w-100  font-weight-bold" name="nome"  value="{{ $funcionario->nome }}" disabled>
                </div>

                <div class="col-12 col-lg-6 col-xl-4 my-3">
                    <label class="text-muted"><b>Endereço:</b></label>
                    <input type="text" class="form-control w-100 font-weight-bold" name="endereco" disabled value="{{ $funcionario->endereco }}" required>
                </div>

                <div class="col-12 col-lg-6 col-xl-4 my-3">
                    <label class="text-muted"><b>RG:</b></label>
                    <input type="number" class="form-control w-100 font-weight-bold" name="rg" disabled value="{{ $funcionario->rg }}" required>
                </div>

                <div class="col-12 col-lg-6 col-xl-4 my-3">
                    <label class="text-muted"><b>CPF:</b></label>
                    <input type="number" class="form-control w-100 font-weight-bold" name="cpf" disabled value="{{ $funcionario->cpf }}" required>
                </div>

                <div class="col-12 col-lg-6 col-xl-4 my-3">
                    <label class="text-muted"><b>Telefone:</b></label>
                    <input type="tel" class="form-control w-100 font-weight-bold" name="telefone" disabled value="{{ $funcionario->telefone }}" required>
                </div>

                <div class="col-12 col-lg-6 col-xl-4 my-3">
                    <label class="text-muted"><b>Telefone Secundário:</b></label>
                    <input type="tel" class="form-control w-100 font-weight-bold" name="telefone_sec" disabled value="{{ $funcionario->telefone_op }}">
                </div>

                <div class="col-12 col-lg-6 my-3">
                    <label class="text-muted"><b>E-mail:</b></label>
                    <input type="email" class="form-control w-100 font-weight-bold" name="email" value="{{ $funcionario->email }}" disabled>
                </div>

                <div class="col-12 col-lg-6 my-3">
                    <label class="text-muted"><b>Ocupação:</b></label>
                    <select class="selectpicker w-100" title="Informe o cargo" name="cargo" disabled>
                        <option {{ ($funcionario->cargo == 'Administrador')?'selected':'' }}>Administrador(a)</option>
                        <option {{ ($funcionario->cargo == 'Vendedor(a)')?'selected':'' }}>Vendedor(a)</option>
                        <option {{ ($funcionario->cargo == 'Recepcionista')?'selected':'' }}>Recepcionista</option>
                        <option {{ ($funcionario->cargo == 'Faxineiro(a)')?'selected':'' }}>Faxineiro(a)</option>
                        <option {{ ($funcionario->cargo == 'Digital Maker')?'selected':'' }}>Digital Maker</option>
                    </select>
                </div>

                <div class="col-12 my-3">
                    <a href="{{ route('administracao.edit', $funcionario->id) }}" class="btn btn-info text-white"><b><i class="fas fa-user-edit"></i> &nbsp;Editar Dados</b></a>
                </div>
            </div>
    </div>


@endsection
