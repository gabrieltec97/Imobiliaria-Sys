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
                    <h6 class="text-muted">Este anúncio ainda não possui imagens. <a href="{{ route('update-fotos', $imovel->id) }}"><span class="text-primary">Clique aqui</span></a>
                        para adicionar.</h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

            <div class="col-12">
                @if(session('msg'))
                    <div class="col-12 mt-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p><b>{{ session('msg') }}</b></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
            </div>

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
                        <h6><b>Status </b>{{ $imovel->status }}</h6>
                    </div>

                    <div class="col-12 col-md-4 mb-2 mb-lg-0">
                        <h6><b>Valor: </b>R$ {{ $imovel->valor }}</h6>
                    </div>

                    <div class="col-12 mt-3 mb-5">
                        <h6><b>Descrição:</b> <br><br>{{ $imovel->descricao }}</h6>
                    </div>

                    <div class="col-12">
                        <p class="text-right mb-0" style="font-style: italic">Criado em: &nbsp;{{ $imovel->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3">

            <form action="{{ route('imovel.edit', $imovel->id) }}">
                @csrf
                <button class="btn btn-info float-right"><i class="fas fa-edit mr-2"></i><b>Editar Anúncio</b></button>
            </form>



            <form action="{{ route('negociar', $imovel->id) }}" method="post">
                @csrf
                @if($imovel->status == 'Disponível para aluguel')
                    <button class="btn btn-custom float-right mr-3 font-weight-bold"><i class="fas fa-edit mr-2"></i>Alugar Imóvel</button>
                @elseif($imovel->status == 'Disponível para venda')
                    <button class="btn btn-custom float-right mr-3 font-weight-bold"><i class="fas fa-edit mr-2"></i>Vender Imóvel</button>
                @endif
            </form>

            <form action="{{ route('imovel.destroy', $imovel->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mb-3 mb-md-0 font-weight-bold"><i class="fas fa-trash mr-2"></i>Excluir Anúncio</button>
            </form>
        </div>
    </div>
</div>

@endsection
