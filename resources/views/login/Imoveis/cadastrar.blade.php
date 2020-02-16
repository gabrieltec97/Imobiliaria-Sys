@extends('includes.sidebar')

@section('title')
    Cadastro de Imóveis
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Cadastro de Imóveis</h1>
    </div>

    <div class="container conteudo_cad">
        <form id="form" action="{{ route('imovel.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body card-cad">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Título do Anúncio</b></label>
                            <input type="text" name="nome" class="form-control w-100"   placeholder="Ex: Apartamento em Brasília.">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Cep</b></label>
                            <input type="number" name="cep"   class="form-control w-100">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Endereço</b></label>
                            <input type="text" name="endereco"  class="form-control w-100" >
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Cidade</b></label>
                            <input type="text" name="cidade"  class="form-control w-100" >
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Estado</b></label>
                            <select class="selectpicker w-100" name="estado"   title="Selecione">
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Tipo de Imóvel</b></label>
                            <select class="selectpicker w-100"  name="tipo_imovel"  title="Selecione">
                                <option>Casa</option>
                                <option>Apartamento</option>
                                <option>Quitinete</option>
                                <option>Casa de Condomínio</option>
                                <option>Hostel</option>
                                <option>Sala de Escritório</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Quantidade de Quartos</b></label>
                            <select class="selectpicker w-100"  name="qt_quartos"  title="Selecione">
                                <option>Não possui</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Quantidade de Suítes</b></label>
                            <select class="selectpicker w-100"  name="qt_suites"  title="Selecione">
                                <option>Não possui</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Vagas de garagem</b></label>
                            <select class="selectpicker w-100"  name="vagas"  title="Selecione">
                                <option>Não possui</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>Superior a 6</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Taxa de Condomínio</b></label>
                            <input type="number" name="tx_cond"  class="form-control w-100" >
                        </div>


                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Tipo de Negócio</b></label>
                            <select class="selectpicker w-100"  name="t_negocio"  title="Selecione">
                                <option>Aluguel</option>
                                <option>Venda</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Status</b></label>
                            <select class="selectpicker w-100"  name="status"  title="Selecione">
                                <option>Disponível para aluguel</option>
                                <option>Disponível para venda</option>
                                <option>Alugado</option>
                                <option>Vendido</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Valor</b></label>
                            <input type="number" name="valor"  class="form-control w-100" >
                        </div>


                        <div class="col-12 col-lg-12 col-xl-12 my-3">
                            <label class="text-muted"><b>Descrição do Imóvel</b></label>
                            <textarea name="descricao"  class="form-control" rows="5"></textarea>
                        </div>

                        <div class="col-12 my-3">
                            <button type="submit" class="btn btn-info"><b>Próxima Etapa <i class="fas fa-arrow-right ml-1"></i></b></button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

    @if(session('msg'))
            <div class="col-12 mt-5">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p><b>{{ session('msg') }}</b></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
            </div>

@endsection

