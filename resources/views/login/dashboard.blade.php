@extends('includes.sidebar')

@section('title')
    Início
@endsection

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-6">
            <a href="{{ route('imovel.index') }}">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6 class="font-weight-bold mb-3">IMÓVEIS DISPONÍVEIS</h6>
                                <h4 class="font-weight-bold">{{ $imoveis }}</h4>
                            </div>
                            <div class="col-4 mt-3">
                                <i class="fas fa-home" style="font-size: 60px; opacity: 38%"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer font-weight-bold text-center">Mais Informações</div>
                </div>
            </a>
        </div>


        <div class="col-lg-6">
            <a href="{{ route('negocios_fechados.index') }}">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6 class="font-weight-bold mb-3">NEGÓCIOS FECHADOS</h6>
                                <h4 class="font-weight-bold">{{ $negocios }}</h4>
                            </div>
                            <div class="col-4 mt-3">
                                <i class="fas fa-handshake" style="font-size: 60px; opacity: 38%"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer font-weight-bold text-center">Mais Informações</div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 mt-lg-5">
            <a href="{{ route('cliente.index') }}">
                <div class="card text-white bg-front mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6 class="font-weight-bold mb-3">CLIENTES</h6>
                                <h4 class="font-weight-bold">{{ $clientes }}</h4>
                            </div>
                            <div class="col-4 mt-3">
                                <i class="fas fa-user-friends" style="font-size: 60px; opacity: 38%"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer font-weight-bold text-center">Mais Informações</div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 mt-lg-5">
            <a href="{{ route('historico.index') }}">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6 class="font-weight-bold mb-3">HISTÓRICO DE NEGÓCIOS</h6>
                                <h4 class="font-weight-bold">{{ $historico }}</h4>
                            </div>
                            <div class="col-4 mt-3">
                                <i class="fas fa-h-square" style="font-size: 60px; opacity: 38%"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer font-weight-bold text-center">Mais Informações</div>
                </div>
            </a>
        </div>
    </div>
</div>


@endsection
