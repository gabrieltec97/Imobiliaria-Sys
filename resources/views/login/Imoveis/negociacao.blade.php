@extends('includes.sidebar')

@section('title')
    Negociação
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Negociação de imóvel</h1>
    </div>

    <div class="container conteudo_cad mb-3">
        <div class="card">
            <div class="card-body card-cad">
                <p class="font-weight-bold text-muted">Caso o cliente ainda não seja cadastrado, <a href="{{ route('cadastro-cliente-negociacao',  $imovel->id) }}" class="text-custom">clique aqui</a> para realizar cadastro e prosseguir com o negócio.</p>
                <form action="{{ route('fechar-negocio', $imovel->id) }}" method="post">
                <div class="row">

                   <div class="col-6 mt-4">
                        @csrf
                       <label class="text-muted font-weight-bold">Cliente <span class="text-danger font-weight-normal">*</span></label>
                       <select name="cliente" class="selectpicker w-100" title="Selecione">
                           @foreach($clientes as $cliente)
                               <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                           @endforeach
                       </select>
                   </div>

                   <div class="col-6 mt-4">
                       <label class="text-muted"><b>Negociado em </b><span class="text-danger">*</span></label>
                       <input type="date" name="negociado_em" class="form-control w-100">
                   </div>

                   <div class="col-6 mt-3">
                       <label class="text-muted font-weight-bold">Imóvel</label>
                       <input type="text" class="form-control" name="nome" value="{{ $imovel->nome }}" disabled>
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

                   <div class="col-12 mt-5">
                       <button class="btn btn-info float-right font-weight-bold">Próxima Etapa<i class="fas fa-arrow-right ml-2"></i></button>
                   </div>
               </div>
                </form>
            </div>
        </div>

    </div>



@endsection

