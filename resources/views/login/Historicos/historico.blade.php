@extends('includes.sidebar')

@section('title')
    Histórico de Negociações
@endsection

@section('content')

    <div class="col-12 mb-3">
        <h1 class="text-center text-muted">Histórico de negociações</h1>
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
                    <div class="row mb-3">
                        <div class="col-12">
                            <h6 class="text-muted"><b>Busca rápida</b></h6>
        <form action="{{ route('buscar-em-historico') }}" method="get" class="form-group">
            <div class="row">
               <div class="col-12 col-lg-9 col-xl-10">
                   <input type="text" name="imovel" class="form-control bg-light my-3 my-md-0" value="{{ (!empty($busca)? $busca : '') }}" placeholder="Digite o nome do imóvel">
               </div>

               <div class="col-12 col-lg-3 col-xl-2">
                   <button type="submit" class="btn btn-custom font-weight-bold"><i class="fas fa-search mr-2"></i>Buscar</button>
               </div>
            </div>
        </form>
    </div>

            <div class="col-12">
                <table class="table table-hover table-responsive-lg">
                    <thead class="border">
                    <tr class="border">
                        <th scope="col">Imóvel Negociado</th>
                        <th scope="col">Cliente responsável</th>
                        <th scope="col">Negociado Em</th>
                        <th scope="col">Status</th>
                        <th scope="col">Negociado Por</th>

                    </tr>
                    </thead>
                    <tbody class="border border-bottom">
                    @foreach($negocios as $negocio)
                        <tr>
                            <th class="text-muted font-weight-bold"><a href="{{ route('historico.show', $negocio->id) }}">{{ $negocio->nome_imovel }}</a></th>
                            <td class="text-muted font-weight-bold"><a href="{{ route('historico.show', $negocio->id) }}">{{ $negocio->nome_cliente }}</a></td>
                            <td class="text-muted font-weight-bold"><a href="{{ route('historico.show', $negocio->id) }}">{{ $negocio->negociado_em }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
                            <td class="text-muted font-weight-bold"><a href="{{ route('historico.show', $negocio->id) }}">{{ $negocio->status }}</a></td>
                            <td class="text-muted font-weight-bold"><a href="{{ route('historico.show', $negocio->id) }}">{{ $negocio->negociado_por }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if(count($negocios) == 0 &&  $verificacao == 1)
                    <h5>Não há registros no histórico.</h5>
                @endif

                @if($valor == 0)
                    <h5>Não foi encontrada nenhuma negociação com estas características.</h5>
                @endif
            </div>

            <div class="col-6 offset-4 offset-xl-5">
                <span>{{ $negocios->links() }}</span>
            </div>
        </div>
    </div>
@endsection
