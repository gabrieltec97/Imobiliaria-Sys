@extends('includes.sidebar')

@section('title')
    Cadastro de Cliente
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Negociação de imóvel</h1>
    </div>

    <div class="container conteudo_cad mb-3">
        <div class="card">
            <div class="card-body card-cad">
                <h5 class="text-muted mb-3">Informações do Cliente</h5>
                <p class="font-weight-bold text-muted">Caso deseje atribuir um imóvel à um cliente já cadastrado, selecione seu nome no menu abaixo:</p>
                <form action="{{ route('fechar-negocio', $imovel->id) }}" method="post">
                <div class="row">

                   <div class="col-6">
                        @csrf
                       <label class="text-muted font-weight-bold">Cliente <span class="text-danger font-weight-normal">*</span></label>
                       <select name="cliente" class="selectpicker w-100" title="Selecione">
                           @foreach($clientes as $cliente)
                               <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                           @endforeach
                       </select>
                   </div>

                   <div class="col-6">
                       <label class="text-muted"><b>Negociado em </b><span class="text-danger">*</span></label>
                       <input type="date" name="negociado_em" class="form-control w-100">
                   </div>

                   <div class="col-12 mt-3">
                       <label class="text-muted font-weight-bold">Imóvel</label>
                       <input type="text" class="form-control" name="nome" value="{{ $imovel->nome }}" disabled>
                   </div>

                   <div class="col-12 mt-5">
                       <button class="btn btn-info float-right font-weight-bold">Próxima Etapa<i class="fas fa-arrow-right ml-2"></i></button>
                   </div>
               </div>
                </form>
            </div>
        </div>

    </div>

    <div class="container conteudo_cad">
{{--        <form id="form" action="{{ route('negociar') }}" method="post" enctype="multipart/form-data">--}}
            @csrf
            <div class="card">
                <div class="card-body card-cad">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Nome </b><span class="text-danger">*</span></label>
                            <input type="text" name="nome" class="form-control w-100" required  placeholder="Ex: Apartamento em Brasília.">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Endereço </b><span class="text-danger">*</span></label>
                            <input type="text" name="endereco" required class="form-control w-100" >
                        </div>


                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Cidade </b><span class="text-danger">*</span></label>
                            <input type="text" name="cidade" required class="form-control w-100" >
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Estado </b><span class="text-danger">*</span></label>
                            <select class="selectpicker w-100" name="estado" required  title="Selecione">
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Cep </b><span class="text-danger">*</span></label>
                            <input type="number" name="cep" required  class="form-control w-100">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Telefone </b><span class="text-danger">*</span></label>
                            <input type="number" name="telefone" required class="form-control w-100" >
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Email </b><span class="text-danger">*</span></label>
                            <input type="email" name="email" required class="form-control w-100">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>CPF </b><span class="text-danger">*</span></label>
                            <input type="number" name="cpf" required class="form-control w-100">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Imóvel Negociado </b></label>
                            <input type="text" name="imovel_negociado" disabled value="{{ $imovel->nome }}" class="form-control w-100">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Negociado em </b></label>
                            <input type="date" name="negociado_em" class="form-control w-100">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Status de pagamento</b></label>
                            <select class="selectpicker w-100" name="status_pagamento"  title="Selecione">
                                <option>Em dia</option>
                                <option>Pago</option>
                                <option>Com dívida</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-12 col-xl-12 my-3">
                            <label class="text-muted"><b>Observações</b></label>
                            <textarea name="observacoes" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="col-12 my-3">
                            <button type="submit" class="btn btn-info float-right"><b><i class="fas fa-user-plus mr-2"></i>Cadastrar Cliente</b></button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

