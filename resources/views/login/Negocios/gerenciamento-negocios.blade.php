@extends('includes.sidebar')

@section('title')
    Gerenciamento de Imóveis
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-center text-muted">Negócios fechados</h1>
    </div>
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
        @if(session('msg-2'))
            <div class="col-12 mt-2">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p><b>{{ session('msg-2') }}</b></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <div class="col-12">
        @if(session('msg-4'))
            <div class="col-12 mt-2">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p><b>{{ session('msg-4') }}</b></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-muted"><b>Busca rápida</b></h6>
                                <form action="{{ route('pesquisar') }}" method="get" class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-lg-9">
                                            <input type="text" name="imovel" class="form-control bg-light my-3 my-md-0" value="{{ (!empty($busca)? $busca : '') }}" placeholder="Digite o nome do imóvel">
                                        </div>

                                        <div class="col-12 col-lg-3">
                                            <button class="btn btn-custom font-weight-bold"><i class="fas fa-search mr-2"></i>Buscar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-12">
                <table class="table table-striped bg-white table-hover table-responsive-lg">
                    <thead class="border">
                    <tr class="border">
                        <th scope="col">Titulo</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Imóvel</th>
                        <th scope="col">Quartos</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody class="border">
                    @foreach($imoveis as $imovel)
                        <tr>
                            <th class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->nome }}</a></th>
                            <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->endereco }}</a></td>
                            <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->tipo_imovel }}</a></td>
                            <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->qt_quartos }}</a></td>
                            <td class="text-muted font-weight-bold"><a href="{{ route('negocios_fechados.show', $imovel->id) }}">{{ $imovel->status }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if(count($imoveis) == 0 &&  $verificacao == 1)
                    <h5>Nenhum imóvel foi negociado ainda.</h5>
                @endif


                @if($valor == 0)
                    <h5>Não foi encontrado nenhum imóvel com estas características.</h5>
                @endif
            </div>
        </div>
    </div>
@endsection
