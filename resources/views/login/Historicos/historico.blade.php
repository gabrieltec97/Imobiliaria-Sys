@extends('includes.sidebar')

@section('title')
    Histórico de negociações
@endsection

@section('content')

    <div class="col-12">
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
        <div class="row">
            <div class="col-12 mt-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-muted"><b>Busca rápida</b></h6>
                            <form action="{{ route('pesquisar') }}" method="get" class="form-group">
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-xl-4 mb-3">
                                        <select class="form-control bg-light" name="tipo_imovel" title="Tipo de Imóvel">
                                            <option></option>
                                            <option>Casa</option>
                                            <option>Apartamento</option>
                                            <option>Quitinete</option>
                                            <option>Casa de Condomínio</option>
                                            <option>Hostel</option>
                                            <option>Sala de Escritório</option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 col-xl-4">
                                        <input type="text" name="cidade" class="form-control bg-light my-3 my-md-0" placeholder="Digite o nome da cidade">
                                    </div>

                                    <div class="col-12 col-xl-4 mt-xl-0">
                                        <button class="btn btn-custom font-weight-bold float-lg-right float-xl-left"><i class="fas fa-search mr-2"></i>Buscar</button>
                                        @if(!empty($ver))
                                            <a href="{{ route('negocios_fechados.index') }}" class="btn btn-front text-white float-right font-weight-bold mr-2"><i class="fas fa-arrow-circle-left mr-2"></i>Voltar</a>
                                        @endif
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
                        <th scope="col">Imóvel Negociado</th>
                        <th scope="col">Cliente responsável</th>
                        <th scope="col">Negociado Em</th>
                        <th scope="col">Status</th>
                        <th scope="col">Negociado Por</th>

                    </tr>
                    </thead>
                    <tbody class="border">
                    @foreach($negocios as $negocio)
                        <tr>
                            <th class="text-muted font-weight-bold"><a href="{{ route('historico.show', $negocio->id) }}">{{ $negocio->nome_imovel }}</a></th>
                            <td class="text-muted font-weight-bold"><a href="{{ route('historico.show', $negocio->id) }}">{{ $negocio->nome_cliente }}</a></td>
                            <td class="text-muted font-weight-bold"><a href="{{ route('historico.show', $negocio->id) }}">{{ $negocio->negociado_em }}</a></td>
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
                    <h5>Não foi encontrado nenhuma negociacao com estas características.</h5>
                @endif
            </div>
        </div>
    </div>
@endsection
