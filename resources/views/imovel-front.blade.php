@extends('home')

@section('title')
    {{ $imovel->nome }}
@endsection

@section('content')

<section>
    <div class="col-12 mt-5 mb-3">
        <h2 class="text-front ml-3">{{ $imovel->nome }} - {{ ($imovel->tipo_negocio == 'Venda') ? 'Disponível para venda' : 'Disponível para aluguel' }}</h2>
        <hr>
    </div>

    @if(session('msg'))
        <div class="col-12 mt-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h6 class="font-weight-bold">{{ session('msg') }}</h6>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
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

            <div class="col-12 mt-4">
                <div class="alert alert-secondary" role="alert">
                   <div class="row">
                       <div class="col-12 col-lg-4 my-4">
                           <h6 class="font-weight-bold text-muted" style="font-size: 18px"><i class="fas fa-map-marker-alt text-front mr-2" style="font-size: 22px"></i>{{ $imovel->endereco }}</h6>
                       </div>

                       <div class="col-12 col-lg-4 my-4">
                           <h6 class="font-weight-bold text-muted" style="font-size: 18px"><i class="fas fa-map-pin text-front mr-2" style="font-size: 22px"></i>{{ $imovel->cidade }}, {{ $imovel->estado }}</h6>
                       </div>

                       <div class="col-12 col-lg-4 my-4">
                           <h6 class="font-weight-bold text-muted" style="font-size: 18px"><i class="fas fa-location-arrow text-front mr-2" style="font-size: 22px"></i>{{ $imovel->cep }}</h6>
                       </div>

                       <div class="col-12 col-lg-4 my-4">
                           <h6 class="font-weight-bold text-muted" style="font-size: 18px"><i class="fas fa-bed text-front mr-2" style="font-size: 25px"></i>{{$imovel->qt_quartos}} {{ ($imovel->qt_quartos > 1) ? 'quartos' : 'quarto' }}</h6>
                       </div>

                       <div class="col-12 col-lg-4 my-4">
                           <h6 class="font-weight-bold text-muted" style="font-size: 18px"><i class="fas fa-shower text-front mr-2" style="font-size: 26px"></i>{{ $imovel->qt_suites }} {{ ($imovel->qt_suites > 1) ? 'suítes' : 'suíte' }}</h6>
                       </div>

                       <div class="col-12 col-lg-4 my-4">
                           <h6 class="font-weight-bold text-muted" style="font-size: 18px"><i class="fas fa-car text-front mr-2" style="font-size: 26px"></i>{{ $imovel->vagas_garagem }} {{ ($imovel->vagas_garagem > 1) ? 'vagas' : 'vaga' }}</h6>
                       </div>

                       <div class="col-12 col-lg-4 my-4">
                           <h6 class="font-weight-bold text-muted" style="font-size: 18px"><i class="fas fa-thumbs-up text-front mr-2" style="font-size: 26px"></i>{{ $imovel->status }}</h6>
                       </div>

                       <div class="col-12 col-lg-4 my-4">
                           <h6 class="font-weight-bold text-muted" style="font-size: 18px"><i class="fas fa-dollar-sign text-front mr-2" style="font-size: 26px"></i> {{ ($imovel->tipo_negocio == "Aluguel") ? $imovel->valor . ',00 mensais' : $imovel->valor . ',00'}}</h6>
                       </div>

                       <div class="col-12 col-lg-4 my-4">
                           <h6 class="font-weight-bold text-muted" style="font-size: 18px"><i class="fas fa-comment-dollar text-front mr-2" style="font-size: 26px"></i> {{ ($imovel->tx_condominio) == 0 ? 'Não possui taxa de condomínio' : $imovel->tx_condominio  . ',00 de taxa de condomínio'}}</h6>
                       </div>

                       <div class="col-12 my-5">
                           <h4 class="font-weight-bold text-muted mb-2">Descrição:</h4>
                           <p class="font-weight-bold">{{ $imovel->descricao }}</p>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h2 class="font-weight-bold text-center">Ficou interessado(a)? Entre em contato conosco!</h2>
                <h6 class="text-muted text-center">Basta preencher o formulário abaixo e entraremos em contato com você!</h6>
            </div>

            <div class="col-12 my-4">
                <form action="{{ route('envia-email') }}" class="form-group">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                        <textarea name="imovel" class="form-control" rows="8">Olá, eu fiquei interessado(a) no imóvel {{ $imovel->nome }} ({{ $imovel->id }}), poderia entrar em contato comigo para me dar mais informações sobre este imóvel?
                        </textarea>
                        </div>

                        <div class="col-12 col-lg-6">
                            <input type="text" class="form-control mb-4" name="nome" placeholder="Digite seu nome">
                            <input type="email" class="form-control mb-4" name="email" placeholder="Digite seu e-mail">
                            <input type="number" class="form-control mb-4" name="tel" placeholder="Digite seu número de telefone">
                            <input type="checkbox" name="contatowpp" value="positivo"> <span class="text-front font-weight-bold">&nbsp;Aceito ser respondido(a) via WhatsApp.</span>
                        </div>

                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-front font-weight-bold float-right">Enviar e-mail</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
