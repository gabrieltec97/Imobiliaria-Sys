@extends('home')

@section('content')
    <section class="primeira_dobra">
        <div class="container">
            <div class="row">
                <div class="col-6 primeira_dobra_content">
                    <h3 class="my-5">ENCONTRE O <b>IMÓVEL IDEAL</b> PARA VOCÊ E <b>SUA FAMÍLIA</b> MORAREM NA PRAIA!</h3>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-lg-2">
                    <button class="btn btn-front">Quero Alugar!</button>
                </div>

                <div class="col-12 col-lg-3 primeira_dobra_botao2">
                    <button class="btn btn-front botao2">Quero Comprar!</button>
                </div>

            </div>
        </div>
    </section>

    <section class="segunda_dobra my-5">
        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col-sm-12 col-md-4 segunda_dobra_content">
                        <label><b>Comprar ou Alugar? &nbsp;&nbsp;&nbsp;</b></label>
                        <select class="selectpicker w-100" title="Escolha...">
                            <option value="">Comprar</option>
                            <option value="">Alugar</option>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-4 segunda_dobra_content">
                        <label><b>Qual o tipo do imóvel?</b></label>
                        <select class="selectpicker w-100" title="Escolha..." multiple data-actions-box="true">
                            <option value="">Casa</option>
                            <option value="">Apartamento</option>
                            <option value="">Sobrado</option>
                            <option value="">Quitinete</option>
                            <option value="">Sala Comercial</option>
                            <option value="">Escritório</option>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-4 segunda_dobra_content">
                        <label><b>Onde você quer? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                        <select class="selectpicker w-100" title="Escolha...">
                            <option value="">Rio de Janeiro</option>
                            <option value="">São Paulo</option>
                        </select>
                    </div>

            </div>

                <div class="row text-right mt-5">
                    <div class="col-12 segunda_dobra_content_botao">
                        <button class="btn btn-front" type="submit"><i class="fas fa-search-location"></i>&nbsp;&nbsp;Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="terceira_dobra bg-light">
        <div class="container">
            <div class="row border-bottom border-front mb-5">
                <div class="col-12 mt-5">
                    <h1 class="text-center">Ambiente no seu <span class="text-front">estilo.</span></h1>
                    <h5 class="text-muted text-center mb-3">Encontre o imóvel com a experiência que você quer viver.</h5>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-11 col-lg-5 ml-lg-5 mb-5 terceira_dobra_content" style="background: url({{asset('site/img/cobertura_oto_1.jpg')}}); height: 17em; background-size: cover;">
                    <a href=""><h4 class="text-center text-white" style="margin-top: 125px">Cobertura</h4></a>
                </div>

                <div class="col-11 col-lg-5 ml-lg-5 mb-5 terceira_dobra_content" style="background: url({{asset('site/img/alto_padrao_1.jpg')}}); height: 17em; background-size: cover;">
                    <a href=""><h4 class="text-center text-white" style="margin-top: 125px">Alto Padrão</h4></a>
                </div>

                <div class="col-11 col-lg-5 ml-lg-5 mb-5 terceira_dobra_content" style="background: url({{asset('site/img/de_frente_pro_mar_original.jpg')}}); height: 17em; background-size: cover;">
                    <a href=""><h4 class="text-center text-white" style="margin-top: 125px">De frente pro mar</h4></a>
                </div>

                <div class="col-11 col-lg-5 ml-lg-5 mb-5 terceira_dobra_content" style="background: url({{asset('site/img/condominio_fechado_1.jpg')}}); height: 17em; background-size: cover;">
                    <a href=""><h4 class="text-center text-white" style="margin-top: 125px">Condomínio fechado</h4></a>
                </div>

                <div class="col-11 col-lg-5 ml-lg-5 mb-5 terceira_dobra_content" style="background: url({{asset('site/img/compacto_1.jpg')}}); height: 17em; background-size: cover;">
                    <a href=""><h4 class="text-center text-white" style="margin-top: 125px">Compacto</h4></a>
                </div>

                <div class="col-11 col-lg-5 ml-lg-5 mb-5 terceira_dobra_content" style="background: url({{asset('site/img/sala_comercial_original.jpg')}}); height: 17em; background-size: cover;">
                    <a href=""><h4 class="text-center text-white" style="margin-top: 125px">Lojas e salas</h4></a>
                </div>

            </div>
        </div>
    </section>

    <section class="quarta_dobra mt-5">
        <div class="container">
            <div class="row border-bottom border-front">
                <div class="col-6">
                    <h2 class="text-front">À Venda</h2>
                </div>

                <div class="col-6">
                    <p class="text-front text-right mt-2">Ver mais</p>
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-12 col-sm-4 mr-sm-5  col-lg-3 quarta_dobra_cards">
                    <div class="card" style="width: 18rem; height: 34rem;">
                        <img class="card-img-top img-fluid" src="{{ asset('site/img/0ed8b84d-67c1-4688-86de-433ec3a498d5.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-front"><b>Linda casa com piscina em Florianópolis</b></h5>
                            <p class="card-text">Imóvel Residencial</p>
                            <p class="text-muted">Casa - Campeche &nbsp;<i class="fas fa-location-arrow icon-1"></i></p>
                            <h4 class="text-front mb-0"><b>R$ 400.000,00</b></h4>
                        </div>

                        <div class="card-footer">
                            <div class="row quarta_dobra_content">
                                <div class="col-4 mt-1">
                                    <i class="fas fa-bed icon-footer text-front"></i>
                                    <p style="margin-left: 15px; margin-top: 5px"><b>3</b></p>
                                </div>

                                <div class="col-4 mt-1">
                                    <i class="fas fa-warehouse icon-footer text-front"></i>
                                    <p style="margin-left: 15px; margin-top: 5px"><b>2</b></p>
                                </div>

                                <div class="col-4 mt-1">
                                    <i class="fas fa-home icon-footer text-front"></i>
                                    <p style="margin-top: 5px"><b>180m²</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4 ml-sm-4 mx-xl-5 col-lg-3 mr-lg-5 quarta_dobra_cards">
                    <div class="card" style="width: 18rem; height: 34rem;">
                        <img class="card-img-top img-fluid" src="{{ asset('site/img/667d07e1-c0ac-4e3b-b450-4bc9bcc9bffb.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-front"><b>Casa com 3 quartos no Campeche com ótima vista</b></h5>
                            <p class="card-text">Imóvel Residencial</p>
                            <p class="text-muted">Casa - Coqueiros &nbsp;<i class="fas fa-location-arrow icon-1"></i></p>
                            <h4 class="text-front mb-0"><b>R$ 350.000,00</b></h4>
                        </div>

                        <div class="card-footer">
                            <div class="row quarta_dobra_content">
                                <div class="col-4 mt-1">
                                    <i class="fas fa-bed icon-footer text-front"></i>
                                    <p style="margin-left: 15px; margin-top: 5px"><b>2</b></p>
                                </div>

                                <div class="col-4 mt-1">
                                    <i class="fas fa-warehouse icon-footer text-front"></i>
                                    <p style="margin-left: 15px; margin-top: 5px"><b>1</b></p>
                                </div>

                                <div class="col-4 mt-1">
                                    <i class="fas fa-home icon-footer text-front"></i>
                                    <p style="margin-top: 5px"><b>120m²</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 mx-xl-5 ml-lg-4 quarta_dobra_cards">
                    <div class="card" style="width: 18rem; height: 34rem;">
                        <img class="card-img-top img-fluid" src="{{ asset('site/img/f6020214-9d26-4904-b24b-2f447ef7c4f8.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-front"><b>Apartamento no prédio XPTO com vista para a lagoa.</b></h5>
                            <p class="card-text">Comercial/Industrial</p>
                            <p class="text-muted">Sala Comercial - Itacorubi &nbsp;<i class="fas fa-location-arrow icon-1"></i></p>
                            <h4 class="text-front mb-0"><b>R$ 600.000,00</b></h4>
                        </div>

                        <div class="card-footer">
                            <div class="row quarta_dobra_content">
                                <div class="col-4 mt-1">
                                    <i class="fas fa-bed icon-footer text-front"></i>
                                    <p style="margin-left: 15px; margin-top: 5px"><b>4</b></p>
                                </div>

                                <div class="col-4 mt-1">
                                    <i class="fas fa-warehouse icon-footer text-front"></i>
                                    <p style="margin-left: 15px; margin-top: 5px"><b>3</b></p>
                                </div>

                                <div class="col-4 mt-1">
                                    <i class="fas fa-home icon-footer text-front"></i>
                                    <p style="margin-top: 5px"><b>200m²</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="quinta_dobra">
        <div class="container-fluid bg-light mt-5">
            <div class="container">
                <div class="row border-bottom border-front">
                    <div class="col-12 col-lg-5  mt-5">
                        <h2 class="text-front">Para Alugar</h2>
                    </div>

                    <div class="col-12 col-lg-6 quinta_dobra_vermais">
                        <p style="margin-top: 63px; margin-right: -95px" class="text-front text-right"><a href="#" style="color: #F25955;">Ver mais</a></p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 col-lg-3 mr-5 quinta_dobra_cards">
                        <div class="card" style="width: 18rem; height: 34rem;">
                            <img class="card-img-top img-fluid" src="{{ asset('site/img/0ed8b84d-67c1-4688-86de-433ec3a498d5.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-front"><b>Linda casa com piscina em Florianópolis</b></h5>
                                <p class="card-text">Imóvel Residencial</p>
                                <p class="text-muted">Casa - Campeche &nbsp;<i class="fas fa-location-arrow icon-1"></i></p>
                                <h4 class="text-front mb-0"><b>R$ 400.000,00</b></h4>
                            </div>

                            <div class="card-footer">
                                <div class="row quarta_dobra_content">
                                    <div class="col-4 mt-1">
                                        <i class="fas fa-bed icon-footer text-front"></i>
                                        <p style="margin-left: 15px; margin-top: 5px"><b>3</b></p>
                                    </div>

                                    <div class="col-4 mt-1">
                                        <i class="fas fa-warehouse icon-footer text-front"></i>
                                        <p style="margin-left: 15px; margin-top: 5px"><b>2</b></p>
                                    </div>

                                    <div class="col-4 mt-1">
                                        <i class="fas fa-home icon-footer text-front"></i>
                                        <p style="margin-top: 5px"><b>180m²</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 ml-sm-4 col-lg-3 mx-xl-5 mr-lg-5 quinta_dobra_cards">
                        <div class="card" style="width: 18rem; height: 34rem;">
                            <img class="card-img-top img-fluid" src="{{ asset('site/img/667d07e1-c0ac-4e3b-b450-4bc9bcc9bffb.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-front"><b>Casa com 3 quartos no Campeche com ótima vista</b></h5>
                                <p class="card-text">Imóvel Residencial</p>
                                <p class="text-muted">Casa - Coqueiros &nbsp;<i class="fas fa-location-arrow icon-1"></i></p>
                                <h4 class="text-front mb-0"><b>R$ 350.000,00</b></h4>
                            </div>

                            <div class="card-footer">
                                <div class="row quarta_dobra_content">
                                    <div class="col-4 mt-1">
                                        <i class="fas fa-bed icon-footer text-front"></i>
                                        <p style="margin-left: 15px; margin-top: 5px"><b>2</b></p>
                                    </div>

                                    <div class="col-4 mt-1">
                                        <i class="fas fa-warehouse icon-footer text-front"></i>
                                        <p style="margin-left: 15px; margin-top: 5px"><b>1</b></p>
                                    </div>

                                    <div class="col-4 mt-1">
                                        <i class="fas fa-home icon-footer text-front"></i>
                                        <p style="margin-top: 5px"><b>120m²</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 ml-lg-4 ml-xl-5 mb-5 quinta_dobra_cards">
                        <div class="card" style="width: 18rem; height: 34rem;">
                            <img class="card-img-top img-fluid" src="{{ asset('site/img/f6020214-9d26-4904-b24b-2f447ef7c4f8.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-front"><b>Apartamento no prédio XPTO com vista para a lagoa.</b></h5>
                                <p class="card-text">Comercial/Industrial</p>
                                <p class="text-muted">Sala Comercial - Itacorubi &nbsp;<i class="fas fa-location-arrow icon-1"></i></p>
                                <h4 class="text-front mb-0"><b>R$ 600.000,00</b></h4>
                            </div>

                            <div class="card-footer">
                                <div class="row quarta_dobra_content">
                                    <div class="col-4 mt-1">
                                        <i class="fas fa-bed icon-footer text-front"></i>
                                        <p style="margin-left: 15px; margin-top: 5px"><b>4</b></p>
                                    </div>

                                    <div class="col-4 mt-1">
                                        <i class="fas fa-warehouse icon-footer text-front"></i>
                                        <p style="margin-left: 15px; margin-top: 5px"><b>3</b></p>
                                    </div>

                                    <div class="col-4 mt-1">
                                        <i class="fas fa-home icon-footer text-front"></i>
                                        <p style="margin-top: 5px"><b>200m²</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
