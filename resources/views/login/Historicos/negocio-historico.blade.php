@extends('includes.sidebar')

@section('title')

@endsection

@section('content')

    <div class="container">
        <div class="col-12 mb-4">
            <h1 class="text-muted text-center">Informações da Negociação</h1>
        </div>
        <div class="col-12">
            @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><b>{{session('msg')}}</b></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
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
                        @if($negocio->observacoes == null)
                            <p class="font-weight-bold">Sem observações</p>
                        @else
                            <p class="font-weight-bold">{{ $negocio->motivo_encerramento }}</p>
                        @endif

                    </div>

                    <div class="col-12 col-lg-4 my-3">
                        <h5 class="text-success font-weight-bold">Data de Encerramento:</h5>
                        <p class="font-weight-bold">{{ $negocio->data_encerramento }}</p>
                    </div>
               @endif

                <div class="col-12 col-lg-4 my-3">
                    <h5 class="text-success font-weight-bold">Status de Pagamento:</h5>
                    @if($negocio->status_pagamento == 'Mensalidades pagas')
                        <p class="font-weight-bold">{{ $negocio->status_pagamento }}</p>
                    @else
                        <p class="font-weight-bold text-danger">{{ $negocio->status_pagamento }}</p>
                    @endif

                </div>

                <div class="col-12 col-lg-4 my-3">
                    <h5 class="text-success font-weight-bold">Observações:</h5>
                    <p class="font-weight-bold">
                        @if($negocio->observacoes == null)
                            Sem observações
                        @else
                            <p class="font-weight-bold text-danger">{{ $negocio->observacoes }}</p>
                        @endif
                    </p>
                </div>

                <div class="col-12 col-lg-4 my-3">
                    <h5 class="text-success font-weight-bold">Negociado Por:</h5>
                    <p class="font-weight-bold">{{ $negocio->negociado_por }}</p>
                </div>

                @if($negocio->status == 'Negócio Encerrado')
                    @if($negocio->status_pagamento == 'Em dívida de pagamento' or $negocio->status_pagamento == 'Em dívida de pagamento de mensalidade')
                        <form action="{{ route('historico.update', $negocio->id) }}" method="post">
                            @csrf
                            @method('put')
                        <div class="col-12 my-3">
                            <input type="checkbox" required name="pago" value="Pagamento ok"><label class="font-weight-bold text-muted">&nbsp;&nbsp;Zerar débitos do cliente.</label>
                            <br>
                            <a href="#" class="btn btn-info font-weight-bold text-white mt-2" data-toggle="modal" data-target="#modalExemplo">Enviar alterações</a>
                        </div>

                            <!-- Modal -->
                            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-front" id="exampleModalLabel"><i class="fas fa-exclamation-circle mr-2"></i>ATENÇÃO!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="font-weight-bold">
                                                Este cliente está com dívidas à serem pagas, ao clicar em "Zerar débitos", você estará informando
                                                ao sistema que este cliente não possui mais dívidas com a imobiliária.
                                                <span class="text-danger">Tem certeza que deseja fazer isso?</span>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger font-weight-bold">Sim, zerar débitos</button>
                                            <button type="button" class="btn btn-success font-weight-bold" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                @endif
                @endif

            </div>
        </div>

    </div>



@endsection
