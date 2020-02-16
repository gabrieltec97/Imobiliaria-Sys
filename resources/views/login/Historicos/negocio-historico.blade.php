@extends('includes.sidebar')

@section('title')

@endsection

@section('content')

    <div class="container">
        <div class="col-12 mb-4">
            <h1 class="text-muted text-center">Informações da Negociação</h1>
        </div>
        <div class="alert alert-secondary" role="alert">
            <div class="row ">
                <div class="col-12 col-lg-4 mt-3">
                    <h5 class="text-success font-weight-bold">Imóvel negociado:</h5>
                    <p class="font-weight-bold">{{ $negocio->nome_imovel }}</p>
                </div>

                <div class="col-12 col-lg-4 mt-3">
                    <h5 class="text-success font-weight-bold">Negociado em:</h5>
                    <p class="font-weight-bold">{{ $negocio->negociado_em }}</p>
                </div>

                <div class="col-12 col-lg-4 mt-3">
                    <h5 class="text-success font-weight-bold">Cliente responsável:</h5>
                    <p class="font-weight-bold">{{ $negocio->nome_cliente }}</p>
                </div>

                <div class="col-12 col-lg-4 my-3">
                    <h5 class="text-success font-weight-bold">Status:</h5>
                    <p class="font-weight-bold">{{ $negocio->status }}</p>
                </div>

               @if($negocio->status == 'Negócio Encerrado')
                    <div class="col-12 col-lg-4 my-3">
                        <h5 class="text-success font-weight-bold">Motivo de Encerramento:</h5>
                        <p class="font-weight-bold">{{ $negocio->motivo_encerramento }}</p>
                    </div>

                    <div class="col-12 col-lg-4 my-3">
                        <h5 class="text-success font-weight-bold">Data de Encerramento:</h5>
                        <p class="font-weight-bold">{{ $negocio->data_encerramento }}</p>
                    </div>
               @endif

                <div class="col-12 col-lg-4 my-3">
                    <h5 class="text-success font-weight-bold">Status de Pagamento:</h5>
                    <p class="font-weight-bold">{{ $negocio->status_pagamento }}</p>
                </div>

                <div class="col-12 col-lg-4 my-3">
                    <h5 class="text-success font-weight-bold">Observações:</h5>
                    <p class="font-weight-bold">
                        @if($negocio->observacoes == null)
                            Sem observações
                        @else
                            {{ $negocio->observacoes }}
                        @endif
                    </p>
                </div>

                <div class="col-12 col-lg-4 my-3">
                    <h5 class="text-success font-weight-bold">Negociado Por:</h5>
                    <p class="font-weight-bold">{{ $negocio->negociado_por }}</p>
                </div>

            </div>
        </div>

    </div>

@endsection
