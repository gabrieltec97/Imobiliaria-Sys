@extends('home')

@section('content')

<section class="bg-light">
   <div class="container">
        <div class="row">
            <div class="col-12 col-lg-2">
                <h2 class="text-front"><i class="fas fa-filter" style="font-size: 0.815em"></i>&nbsp; Filtro</h2>
            </div>
        </div>

       <div class="row mt-4 mb-2">
           <div class="col-12 col-lg-4 bg-white mb-5">
               <label class="text-front mt-3"><b>Comprar ou Alugar?</b></label>
               <select class="selectpicker w-100" title="Escolha...">
                   <option>Comprar</option>
                   <option>Alugar</option>
               </select>

               <label class="text-front mt-4"><b>O que você quer?</b></label>
               <select class="selectpicker w-100" title="Escolha...">
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
               <select class="selectpicker w-100" title="Escolha...">
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
               <select class="selectpicker w-100" title="Escolha...">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
                   <option>5</option>
                   <option>6</option>
                   <option>7</option>
               </select>

               <label class="text-front mt-4"><b>Banheiros</b></label>
               <select class="selectpicker w-100" title="Escolha...">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
               </select>

               <label class="text-front mt-4"><b>Garagem</b></label>
               <select class="selectpicker w-100" title="Escolha...">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
               </select>

               <label class="text-front mt-3"><b>Preço até:</b></label>
               <input type="number" class="form-control w-100 mb-4">

               <button type="submit" style="float:right;" class="btn btn-front mb-3 buscar"><i class="fas fa-search" style="font-size: 16px"></i>&nbsp; Pesquisar</button>
           </div>

           <div class="col-12 col-sm-6 col-lg-4 cards_results">
               <div class="card ml-3 ml-xl-5" style="width: 18rem; height: 34rem;">
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

           <div class="col-12 col-sm-6 col-lg-4 cards_results">
               <div class="card ml-3 ml-xl-5" style="width: 18rem; height: 34rem;">
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
