@extends('includes.sidebar')

@section('title')
    {{ $imovel->nome }}
@endsection

@section('content')

    <div class="container">
        <div class="row">

            @if(count($imagens) == 0)
                <div class="col-12 mt-3 mb-0">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h6 class="text-muted">Imóvel cadastrado sem imagens.</h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            <div class="col-12">
                <h3 class="text-muted">{{ $imovel->nome }} {{ $imovel->status == 'Alugado' ? '(Alugado)' : '(Vendido)' }}</h3>
                <hr>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($imagens as $key => $imagem)

                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img class="d-block w-100 imagem-carrossel" src="{{ asset($imagem->foto_anuncio) }}">
                            </div>

                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </div>


            <div class="col-12 mt-3">
                <div class="alert alert-bg" role="alert">

                    <div class="row mt-3">
                        <div class="col-12 col-md-4 mb-2">
                            <h6>{{ $imovel->endereco }}</h6>
                        </div>

                        <div class="col-12 col-md-4 mb-2 mb-lg-0">
                            <h6>{{ $imovel->cidade }}, {{ $imovel->estado }}</h6>
                        </div>

                        <div class="col-12 col-md-4  mb-2 mb-lg-0">
                            <h6>{{ $imovel->cep }}</h6>
                        </div>

                        <div class="col-12 col-md-4 my-lg-3 mb-2 mb-lg-0">
                            <h6><b>Quartos:</b>&nbsp; {{ $imovel->qt_quartos }}</h6>
                        </div>

                        <div class="col-12 col-md-4 my-lg-3 mb-2 mb-lg-0">
                            <h6><b>Suítes:</b>&nbsp; {{ $imovel->qt_suites }}</h6>
                        </div>

                        <div class="col-12 col-md-4 my-lg-3 mb-2 mb-lg-0">
                            <h6><b>Vagas/Garagem:</b> &nbsp;{{ $imovel->vagas_garagem }}</h6>
                        </div>

                        <div class="col-12 col-md-4 mb-2 mb-lg-0">
                            <h6><b>Taxa de condomínio: </b>R$ {{ $imovel->tx_condominio }}</h6>
                        </div>

                        <div class="col-12 col-md-4 mb-2 mb-lg-0">
                            <h6><b>Status: </b>{{ $imovel->status }}</h6>
                        </div>

                        <div class="col-12 col-md-4 mb-2 mb-lg-0">
                            <h6><b>Valor: </b>R$ {{ $imovel->valor }}</h6>
                        </div>

                        <table class="table table-striped my-5 table-hover table-responsive-lg">
                            <thead class="border">
                            <tr class="border">
                                <th scope="col">Responsável pelo Imóvel</th>
                                <th scope="col">Negociado Em</th>
                                <th scope="col">Status de Pagamento</th>
                                <th scope="col">Observações</th>
                                <th scope="col">Negociado Por</th>

                            </tr>
                            </thead>
                            <tbody class="border">
                                <tr>
                                    <th class="text-muted font-weight-bold"><a href="{{ route('cliente.show', $cliente->id) }}">{{ $cliente->nome }}</a></th>
                                    <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->negociado_em }}</a></td>
                                    <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">
                                            @if($imovel->status_pagamento == 'Atrasado')
                                                <p class="text-danger">Atrasado</p>
                                            @else
                                                {{ $imovel->status_pagamento }}
                                            @endif
                                        </a></td>

                                    @if($imovel->observacoes == '' or $imovel->observacoes == null)
                                        <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">Sem observações</a></td>
                                    @else
                                        <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->observacoes }}</a></td>
                                    @endif
                                    <td class="text-muted font-weight-bold">{{ $imovel->negociado_por }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-12">


                            <h6 class="font-wheight-bold">Contrato do negócio</h6>
                            <a href="{{ route('download', $imovel->id) }}">
                                <img src="../../public/images/contrato.jpg" style="height: 100px">
                            </a>
                        </div>

                        <div class="col-12">
                            <p class=" mb-0 text-right" style="font-style: italic">Registrado em: &nbsp;{{ $imovel->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-6 mt-3">
               <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-front text-white font-weight-bold">
                        <i class="fas fa-user-minus mr-2"></i>Desfazer negócio</a>
            </div>

                <div class="col-6 mt-3">
                    <a href="{{ route('negocios_fechados.edit', $imovel->id) }}" class="btn btn-custom mb-3 text-white mb-md-0 float-right font-weight-bold"><i class="fas fa-edit mr-2"></i>Atualizar Registro</a>
                </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="text-front fas fa-exclamation-circle mr-2"></i>ATENÇÃO!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($imovel->status == 'Alugado')
                    <h6>Este imóvel foi alugado para <b>{{ $cliente->nome }}</b>. Ao colocá-lo disponível novamente, você
                    estará desfazendo o negócio e também não poderá mais acessar o contrato pelo sistema. Tem certeza
                        que deseja realizar esta operação?</h6>
                    @elseif($imovel->status == 'Vendido')
                    <h6>Este imóvel foi vendido para <b>{{ $cliente->nome }}</b>. Ao colocá-lo disponível novamente, você
                    estará desfazendo o negócio e também não poderá mais acessar o contrato pelo sistema. Tem certeza
                        que deseja realizar esta operação?</h6>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-front font-weight-bold" data-toggle="modal" data-target="#exampleModal2" data-dismiss="modal">Sim, desfazer</button>
                    <button type="button" class="btn btn-success font-weight-bold" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Motivo do cancelamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('negocios-retorno', $imovel->id) }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label class="text-muted font-weight-bold">Informe o motivo do cancelamento do negócio:</label>
                                <textarea name="cancelamento" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-front font-weight-bold">Encerrar Negócio</button>
                    <button type="button" class="btn btn-success font-weight-bold" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
