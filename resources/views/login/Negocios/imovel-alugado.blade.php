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
                <h3 class="text-muted">{{ $imovel->nome }}</h3>
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
                            <h6><b>Taxa de condomínio: </b>{{ $imovel->tx_condominio }}</h6>
                        </div>

                        <div class="col-12 col-md-4 mb-2 mb-lg-0">
                            <h6><b>Status: </b>{{ $imovel->status }}</h6>
                        </div>

                        <div class="col-12 col-md-4 mb-2 mb-lg-0">
                            <h6><b>Valor: </b>R$ {{ $imovel->valor }}</h6>
                        </div>

                        <div class="col-8 mb-2 mt-4 mb-lg-0">
                            <h6><b>Responsável pelo imóvel: </b><a href="{{ route('cliente.show', $cliente[1]) }}" class="text-primary">{{ $cliente[0] }}</a></h6>
                        </div>

                        <div class="col-12 my-5">
                            <h6><b>Descrição:</b> <br><br>{{ $imovel->descricao }}</h6>
                        </div>

                        <div class="col-12 mt-3 mb-2">
                            @if($imovel->status == 'Alugado')

                                <h6 class="text-danger">Este imóvel foi alugado. Caso ele esteja novamente disponível,
                                    <a href="#"><span class="text-primary" data-toggle="modal" data-target="#exampleModal">clique aqui</span> para colocá-lo novamente na listagem de imóveis disponíveis.</h6>

                                @elseif($imovel->status == 'Vendido')

                                <h6 class="text-danger">Este imóvel foi vendido. Caso ele esteja novamente disponível,
                                    <a href="{{ route('negocios-retorno', $imovel->id) }}" type="submit"><span class="text-primary">clique aqui</span></a> para colocá-lo novamente na listagem de imóveis disponíveis.</h6>
                            @endif
                        </div>

                        <div class="col-12">
                            <p class=" mb-0" style="font-style: italic">Registrado em: &nbsp;{{ $imovel->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">

                <form action="{{ route('negocios_fechados.destroy', $imovel->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger float-right ml-3 mb-3 mb-md-0"><i class="fas fa-trash mr-2"></i>Excluir Registro</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="text-danger fas fa-exclamation-circle mr-2"></i>ATENÇÃO!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($imovel->status == 'Alugado')
                    <h6>Este imóvel foi alugado para <b>{{ $cliente[0] }}</b>. Ao colocá-lo disponível novamente, você
                    estará desfazendo o negócio e também não poderá mais acessar o contrato pelo sistema. Tem certeza
                        que deseja realizar esta operação?</h6>
                    @elseif($imovel->status == 'Vendido')
                    <h6>Este imóvel foi vendido para <b>{{ $cliente[0] }}</b>. Ao colocá-lo disponível novamente, você
                    estará desfazendo o negócio e também não poderá mais acessar o contrato pelo sistema. Tem certeza
                        que deseja realizar esta operação?</h6>
                    @endif

                    <form action="{{ route('negocios-retorno', $imovel->id) }}" method="get">
                    @csrf


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger font-weight-bold">Sim, desfazer</button>
                    <button type="button" class="btn btn-success font-weight-bold" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
