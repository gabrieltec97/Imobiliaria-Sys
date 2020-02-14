@extends('includes.sidebar')

@section('title')
    Cadastro e negociação
@endsection

@section('content')
<div class="container conteudo_cad">
    <form id="form" action="{{ route('negociar-cadastrar', $imovel->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-12 mb-4">
            <h1 class="text-muted text-center">Cadastro e negociação</h1>
        </div>

        <div class="card">
            <div class="card-body card-cad">
                <div class="row">
                    <div class="col-12">
                        <h6 class="text-muted font-weight-bold">Basta preencher o
                            formulário abaixo que o negócio será feito e o cliente será cadastrado automaticamente.</h6>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Nome </b><span class="text-danger">*</span></label>
                        <input type="text" name="nome" class="form-control w-100" required >
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
                        <label class="text-muted font-weight-bold">Imóvel  </label><span class="text-danger"> *</span>
                        <input type="text" class="form-control" name="nome" value="{{ $imovel->nome }}" disabled>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Negociado em </b><span class="text-danger">*</span></label>
                        <input type="date" name="negociado_em" class="form-control w-100">
                    </div>

                    <div class="col-12 col-lg-6 col-xl-4 my-3">
                        <label class="text-muted"><b>Status de pagamento </b><span class="text-danger">*</span></label>
                        <select name="status_pagamento" class="selectpicker w-100" title="Escolha..">
                            <option>Pago</option>
                            <option>Aguardando pagamento</option>
                            <option>Mensalidades em dia</option>
                            <option>Atrasado</option>
                        </select>
                    </div>

                    <div class="col-12 my-3">
                        <label class="text-muted"><b>Observações</b></label>
                        <textarea name="observacoes" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-info float-right"><b>Próxima Etapa<i class="fas fa-arrow-right ml-2"></i></b></button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
    @endsection
