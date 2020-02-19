@extends('home')

@section('content')

<section class="bg-light">
   <div class="container">
        <div class="row">
            <div class="col-12 col-lg-2">
                <h2 class="text-front"><i class="fas fa-filter" style="font-size: 0.815em"></i>&nbsp; Filtro</h2>
            </div>
        </div>
       <form action="">
           @csrf
       <div class="row mt-4 mb-2">
           <div class="col-12 col-lg-4 bg-white mb-5">
               <label class="text-front mt-3"><b>Comprar ou Alugar?</b></label>
               <select class="selectpicker w-100" name="tipo_negocio" title="Escolha...">
                   <option value="Aluguel">Alugar</option>
                   <option value="Venda">Comprar</option>
               </select>

               <label class="text-front mt-4"><b>O que você quer?</b></label>
               <select class="selectpicker w-100" name="" title="Escolha...">
                   <option>Casa de praia</option>
                   <option>Casa de campo</option>
                   <option>Casa em condomínio fechado</option>
                   <option>Casa em bairro residencial</option>
                   <option>Apartamento na praia</option>
                   <option>Apartamento em condomínio fechado</option>
                   <option>Apartamento em bairro residencial</option>
                   <option>Quitinetes</option>
               </select>

               <label class="text-front mt-4"><b>Onde você quer?</b></label>
               <select class="selectpicker w-100" name="" title="Escolha...">
                   <option>Rio de Janeiro</option>
                   <option>São Paulo</option>
                   <option>Rio Grande do Sul</option>
                   <option>Minas Gerais</option>
                   <option>Santa Catarina</option>
                   <option>Paraná</option>
                   <option>Espírito Santo</option>
                   <option>Bahia</option>
                   <option>Pernambuco</option>
               </select>

               <label class="text-front mt-4"><b>Quartos</b></label>
               <select class="selectpicker w-100" name="" title="Escolha...">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
                   <option>5</option>
                   <option>6</option>
                   <option>7</option>
               </select>

               <label class="text-front mt-4"><b>Banheiros</b></label>
               <select class="selectpicker w-100" name="" title="Escolha...">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
               </select>

               <label class="text-front mt-4"><b>Garagem</b></label>
               <select class="selectpicker w-100" name="" title="Escolha...">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
               </select>

               <label class="text-front mt-3"><b>Preço até:</b></label>
               <input type="number" class="form-control w-100 mb-4" name="">

               <button type="submit" style="float:right;" class="btn btn-front mb-3 buscar"><i class="fas fa-search" style="font-size: 16px"></i>&nbsp; Pesquisar</button>
           </div>
       </form>


           @if(count($imoveis) == '')
              <div class="col-8">
                  <h3 class="mb-5 text-muted text-center">Infelizmente não encontramos nenhum imóvel com estas características.</h3>
                  <p class="text-center"><img src="{{ asset('/images/triste.png') }}" style="height: 100px; opacity: 9%"></p>
              </div>
           @else
           @foreach($imoveis as $imovel)
               <div class="col-12 col-lg-4 cards_results mb-4">
                   <div class="card ml-xl-5" style="width: 18rem; height: 34rem;">
                       @foreach($fotos as $foto)
                           @if($imovel->id == $foto['id'])
                               <a href="{{ route('ap-imovel', $imovel->id) }}"><img class="card-img-top img-fluid" src="{{ asset($foto['foto']) }}" style="height: 210px" alt="Card image cap"></a>
                           @endif
                       @endforeach
                       <div class="card-body">
                           <a href="{{ route('ap-imovel', $imovel->id) }}"><h5 class="card-title text-front"><b>{{ $imovel->nome }}</b></h5></a>
                           <a href="{{ route('ap-imovel', $imovel->id) }}"><h6 class="card-title text-muted">{{ $imovel->endereco }}</h6></a>
                           <a href="{{ route('ap-imovel', $imovel->id) }}"><p class="text-muted">{{ $imovel->cidade }}, {{ $imovel->estado }} &nbsp;<i class="fas fa-location-arrow icon-1"></i></p></a>
                           <a href="{{ route('ap-imovel', $imovel->id) }}"><p class="card-text text-muted">{{ $imovel->tipo_imovel }} - {{ $imovel->status }}
                                   <br><br><br></p></a>
                           <a href="{{ route('ap-imovel', $imovel->id) }}"><h4 class="text-front mb-0"><b>R$ {{ $imovel->valor }},00</b></h4></a>
                       </div>

                       <div class="card-footer">
                           <div class="row quarta_dobra_content">
                               <div class="col-4 mt-1">
                                   <i class="fas fa-bed icon-footer text-front"></i>
                                   <p style="margin-left: 15px; margin-top: 5px"><b>{{ $imovel->qt_quartos }}</b></p>
                               </div>

                               <div class="col-4 mt-1">
                                   <i class="fas fa-warehouse icon-footer text-front"></i>
                                   <p style="margin-left: 15px; margin-top: 5px"><b>
                                           @if($imovel->vagas_garagem == 'Não possui')
                                               0
                                           @else
                                               {{ $imovel->vagas_garagem }}
                                           @endif
                                       </b></p>
                               </div>

                               <div class="col-4 mt-1">
                                   <i class="fas fa-home icon-footer text-front"></i>
                                   <p style="margin-top: 5px"><b>200m²</b></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           @endforeach
               @endif
   </div>
    </div>
   </div>
</section>

@endsection
