@extends('includes.sidebar')

@section('title')
    Dados do Cliente
@endsection

@section('content')
    <div class="container conteudo_cad">
        <div class="col-12">
            <h1 class="text-muted text-center mb-3">Dados do cliente</h1>
        </div>
        <div class="card">
            <div class="card-body card-cad">
                <div class="row mt-4">
                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Nome:</b></label>
                        <input type="text" class="form-control w-100  font-weight-bold" name="nome"  value="{{ $cliente->nome }}" disabled>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Endereço:</b></label>
                        <input type="text" class="form-control w-100 font-weight-bold" name="endereco" disabled value="{{ $cliente->endereco }}" required>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Cidade </b><span class="text-danger">*</span></label>
                        <input type="text" name="cidade" required class="form-control w-100" disabled value="{{ $cliente->cidade }}">
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Estado</b></label>
                        <select class="selectpicker w-100" name="estado" required disabled title="Selecione">
                            <option value="AC" {{ ($cliente->estado == 'AC')?'selected':'' }}>Acre</option>
                            <option value="AL" {{ ($cliente->estado == 'AL')?'selected':'' }}>Alagoas</option>
                            <option value="AP" {{ ($cliente->estado == 'AP')?'selected':'' }}>Amapá</option>
                            <option value="AM" {{ ($cliente->estado == 'AM')?'selected':'' }}>Amazonas</option>
                            <option value="BA" {{ ($cliente->estado == 'BA')?'selected':'' }}>Bahia</option>
                            <option value="CE" {{ ($cliente->estado == 'CE')?'selected':'' }}>Ceará</option>
                            <option value="DF" {{ ($cliente->estado == 'DF')?'selected':'' }}>Distrito Federal</option>
                            <option value="ES" {{ ($cliente->estado == 'ES')?'selected':'' }}>Espírito Santo</option>
                            <option value="GO" {{ ($cliente->estado == 'GO')?'selected':'' }}>Goiás</option>
                            <option value="MA" {{ ($cliente->estado == 'MA')?'selected':'' }}>Maranhão</option>
                            <option value="MT" {{ ($cliente->estado == 'MT')?'selected':'' }}>Mato Grosso</option>
                            <option value="MS" {{ ($cliente->estado == 'MS')?'selected':'' }}>Mato Grosso do Sul</option>
                            <option value="MG" {{ ($cliente->estado == 'MG')?'selected':'' }}>Minas Gerais</option>
                            <option value="PA" {{ ($cliente->estado == 'PA')?'selected':'' }}>Pará</option>
                            <option value="PB" {{ ($cliente->estado == 'PB')?'selected':'' }}>Paraíba</option>
                            <option value="PR" {{ ($cliente->estado == 'PR')?'selected':'' }}>Paraná</option>
                            <option value="PE" {{ ($cliente->estado == 'PE')?'selected':'' }}>Pernambuco</option>
                            <option value="PI" {{ ($cliente->estado == 'PI')?'selected':'' }}>Piauí</option>
                            <option value="RJ" {{ ($cliente->estado == 'RJ')?'selected':'' }}>Rio de Janeiro</option>
                            <option value="RN" {{ ($cliente->estado == 'RN')?'selected':'' }}>Rio Grande do Norte</option>
                            <option value="RS" {{ ($cliente->estado == 'RS')?'selected':'' }}>Rio Grande do Sul</option>
                            <option value="RO" {{ ($cliente->estado == 'RO')?'selected':'' }}>Rondônia</option>
                            <option value="RR" {{ ($cliente->estado == 'RR')?'selected':'' }}>Roraima</option>
                            <option value="SC" {{ ($cliente->estado == 'SC')?'selected':'' }}>Santa Catarina</option>
                            <option value="SP" {{ ($cliente->estado == 'SP')?'selected':'' }}>São Paulo</option>
                            <option value="SE" {{ ($cliente->estado == 'SE')?'selected':'' }}>Sergipe</option>
                            <option value="TO" {{ ($cliente->estado == 'TO')?'selected':'' }}>Tocantins</option>
                        </select>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>cep:</b></label>
                        <input type="number" class="form-control w-100 font-weight-bold" name="cep" disabled value="{{ $cliente->cep }}" required>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>telefone:</b></label>
                        <input type="number" class="form-control w-100 font-weight-bold" name="telefone" disabled value="{{ $cliente->telefone }}" required>
                    </div>

                    <div class="col-12 col-lg-6 my-3">
                        <label class="text-muted"><b>E-mail:</b></label>
                        <input type="email" class="form-control w-100 font-weight-bold" name="email" value="{{ $cliente->email }}" disabled>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>CPF:</b></label>
                        <input type="number" class="form-control w-100 font-weight-bold" name="cpf" disabled value="{{ $cliente->cpf }}" required>
                    </div>

                    <div class="col-12 col-lg-6 my-3">
                        <label class="text-muted"><b>Imóvel Negociado:</b></label>
                        <select class="selectpicker w-100" title="Informe o cargo" name="imovel_negociado" disabled>

                        </select>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Negociado em </b></label>
                        <input type="date" name="negociado_em" disabled class="form-control w-100">
                    </div>

                    <div class="col-12 col-lg-12 col-xl-12 my-3">
                        <label class="text-muted"><b>Observações</b></label>
                        <textarea name="observacoes" class="form-control" disabled rows="5"></textarea>
                    </div>

                    <div class="col-12 my-3">
                        <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-info text-white"><b><i class="fas fa-user-edit"></i> &nbsp;Editar Dados</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
