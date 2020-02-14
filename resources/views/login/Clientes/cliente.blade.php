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
                        <input type="text" name="cidade" required class="form-control w-100 font-weight-bold" disabled value="{{ $cliente->cidade }}">
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

                    @if(count($imoveis) > 0)
                    <table class="table table-striped my-5 table-hover table-responsive-lg">
                        <thead class="border">
                        <tr class="border">
                            <th scope="col">Imóvel Negociado</th>
                            <th scope="col">Negociado Em</th>
                            <th scope="col">Status de Pagamento</th>
                            <th scope="col">Observações</th>

                        </tr>
                        </thead>
                        <tbody class="border">
                            @foreach($imoveis as $imovel)
                                <tr>
                                    <th class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->nome }}</a></th>
                                    <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->negociado_em }}</a></td>
                                    <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">
                                            @if($imovel->status_pagamento == 'Atrasado')
                                                <p class="text-danger">Atrasado</p>
                                            @else
                                                {{$imovel->status_pagamento}}
                                            @endif
                                        </a></td>

                                    @if($imovel->observacoes == '')
                                        <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">Sem observações</a></td>
                                    @else
                                        <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->observacoes }}</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="col-12 mt-5 mb-2">
                            <h6 class="text-danger font-weight-bold">Este cliente ainda não negociou nenhum imóvel.</h6>
                        </div>
                    @endif

                    <div class="col-12 my-3">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-info text-white"><b><i class="fas fa-user-edit"></i> &nbsp;Editar Dados</b></a>
                            </div>
                            <div class="col-12 col-lg-8 mt-2 mt-lg-0">

                                <form action="{{ route('cliente.destroy', $cliente->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger float-right"><b><i class="fas fa-trash mr-2"></i>Excluir cadastro de cliente</b></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
