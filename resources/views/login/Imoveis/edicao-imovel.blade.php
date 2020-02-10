@extends('includes.sidebar')

@section('title')
    Edição de Cadastro de Imóvel
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Alteração de cadastro</h1>
    </div>

    <div class="container conteudo_cad">
        <form id="form" action="{{ route('imovel.update', $imovel->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body card-cad">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Título do Anúncio</b></label>
                            <input type="text" name="nome" class="form-control w-100" required value=" {{ $imovel->nome }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Cep</b></label>
                            <input type="number" name="cep" required  class="form-control w-100" value="{{ $imovel->cep }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Endereço</b></label>
                            <input type="text" name="endereco" required class="form-control w-100" value=" {{ $imovel->endereco }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Cidade</b></label>
                            <input type="text" name="cidade" required class="form-control w-100" value=" {{ $imovel->cidade }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Estado</b></label>
                            <select class="selectpicker w-100" name="estado" required  title="Selecione">
                                <option value="AC" {{ ($imovel->estado == 'AC')?'selected':'' }}>Acre</option>
                                <option value="AL" {{ ($imovel->estado == 'AL')?'selected':'' }}>Alagoas</option>
                                <option value="AP" {{ ($imovel->estado == 'AP')?'selected':'' }}>Amapá</option>
                                <option value="AM" {{ ($imovel->estado == 'AM')?'selected':'' }}>Amazonas</option>
                                <option value="BA" {{ ($imovel->estado == 'BA')?'selected':'' }}>Bahia</option>
                                <option value="CE" {{ ($imovel->estado == 'CE')?'selected':'' }}>Ceará</option>
                                <option value="DF" {{ ($imovel->estado == 'DF')?'selected':'' }}>Distrito Federal</option>
                                <option value="ES" {{ ($imovel->estado == 'ES')?'selected':'' }}>Espírito Santo</option>
                                <option value="GO" {{ ($imovel->estado == 'GO')?'selected':'' }}>Goiás</option>
                                <option value="MA" {{ ($imovel->estado == 'MA')?'selected':'' }}>Maranhão</option>
                                <option value="MT" {{ ($imovel->estado == 'MT')?'selected':'' }}>Mato Grosso</option>
                                <option value="MS" {{ ($imovel->estado == 'MS')?'selected':'' }}>Mato Grosso do Sul</option>
                                <option value="MG" {{ ($imovel->estado == 'MG')?'selected':'' }}>Minas Gerais</option>
                                <option value="PA" {{ ($imovel->estado == 'PA')?'selected':'' }}>Pará</option>
                                <option value="PB" {{ ($imovel->estado == 'PB')?'selected':'' }}>Paraíba</option>
                                <option value="PR" {{ ($imovel->estado == 'PR')?'selected':'' }}>Paraná</option>
                                <option value="PE" {{ ($imovel->estado == 'PE')?'selected':'' }}>Pernambuco</option>
                                <option value="PI" {{ ($imovel->estado == 'PI')?'selected':'' }}>Piauí</option>
                                <option value="RJ" {{ ($imovel->estado == 'RJ')?'selected':'' }}>Rio de Janeiro</option>
                                <option value="RN" {{ ($imovel->estado == 'RN')?'selected':'' }}>Rio Grande do Norte</option>
                                <option value="RS" {{ ($imovel->estado == 'RS')?'selected':'' }}>Rio Grande do Sul</option>
                                <option value="RO" {{ ($imovel->estado == 'RO')?'selected':'' }}>Rondônia</option>
                                <option value="RR" {{ ($imovel->estado == 'RR')?'selected':'' }}>Roraima</option>
                                <option value="SC" {{ ($imovel->estado == 'SC')?'selected':'' }}>Santa Catarina</option>
                                <option value="SP" {{ ($imovel->estado == 'SP')?'selected':'' }}>São Paulo</option>
                                <option value="SE" {{ ($imovel->estado == 'SE')?'selected':'' }}>Sergipe</option>
                                <option value="TO" {{ ($imovel->estado == 'TO')?'selected':'' }}>Tocantins</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Tipo de Imóvel</b></label>
                            <select class="selectpicker w-100" required name="tipo_imovel"  title="Selecione">
                                <option {{ ($imovel->tipo_imovel == 'Casa')?'selected':'' }}>Casa</option>
                                <option {{ ($imovel->tipo_imovel == 'Apartamento')?'selected':'' }}>Apartamento</option>
                                <option {{ ($imovel->tipo_imovel == 'Quitinete')?'selected':'' }}>Quitinete</option>
                                <option {{ ($imovel->tipo_imovel == 'Casa de Condomínio')?'selected':'' }}>Casa de Condomínio</option>
                                <option {{ ($imovel->tipo_imovel == 'Hostel')?'selected':'' }}>Hostel</option>
                                <option {{ ($imovel->tipo_imovel == 'Sala de Escritório')?'selected':'' }}>Sala de Escritório</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Quantidade de Quartos</b></label>
                            <select class="selectpicker w-100" required name="qt_quartos"  title="Selecione">
                                <option {{ ($imovel->qt_quartos == 'Não possui')?'selected':'' }}>Não possui</option>
                                <option {{ ($imovel->qt_quartos == '1')?'selected':'' }}>1</option>
                                <option {{ ($imovel->qt_quartos == '2')?'selected':'' }}>2</option>
                                <option {{ ($imovel->qt_quartos == '3')?'selected':'' }}>3</option>
                                <option {{ ($imovel->qt_quartos == '4')?'selected':'' }}>4</option>
                                <option {{ ($imovel->qt_quartos == '5')?'selected':'' }}>5</option>
                                <option {{ ($imovel->qt_quartos == '6')?'selected':'' }}>6</option>
                                <option {{ ($imovel->qt_quartos == '7')?'selected':'' }}>7</option>
                                <option {{ ($imovel->qt_quartos == '8')?'selected':'' }}>8</option>
                                <option {{ ($imovel->qt_quartos == '9')?'selected':'' }}>9</option>
                                <option {{ ($imovel->qt_quartos == '10')?'selected':'' }}>10</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Quantidade de Suítes</b></label>
                            <select class="selectpicker w-100" required name="qt_suites"  title="Selecione">
                                <option {{ ($imovel->qt_suites == 'Não possui')?'selected':'' }}>Não possui</option>
                                <option {{ ($imovel->qt_suites == '1')?'selected':'' }}>1</option>
                                <option {{ ($imovel->qt_suites == '2')?'selected':'' }}>2</option>
                                <option {{ ($imovel->qt_suites == '3')?'selected':'' }}>3</option>
                                <option {{ ($imovel->qt_suites == '4')?'selected':'' }}>4</option>
                                <option {{ ($imovel->qt_suites == '5')?'selected':'' }}>5</option>
                                <option {{ ($imovel->qt_suites == '6')?'selected':'' }}>6</option>
                                <option {{ ($imovel->qt_suites == '7')?'selected':'' }}>7</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Vagas de garagem</b></label>
                            <select class="selectpicker w-100" required name="vagas_garagem"  title="Selecione">
                                <option {{ ($imovel->vagas_garagem == 'Não possui')?'selected':'' }}>Não possui</option>
                                <option {{ ($imovel->vagas_garagem == '1')?'selected':'' }}>1</option>
                                <option {{ ($imovel->vagas_garagem == '2')?'selected':'' }}>2</option>
                                <option {{ ($imovel->vagas_garagem == '3')?'selected':'' }}>3</option>
                                <option {{ ($imovel->vagas_garagem == '4')?'selected':'' }}>4</option>
                                <option {{ ($imovel->vagas_garagem == '5')?'selected':'' }}>5</option>
                                <option {{ ($imovel->vagas_garagem == '6')?'selected':'' }}>6</option>
                                <option {{ ($imovel->vagas_garagem == 'Superior a 6')?'selected':'' }}>Superior a 6</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Taxa de Condomínio</b></label>
                            <input type="number" name="tx_condominio" required class="form-control w-100" value="{{ $imovel->tx_condominio }}">
                        </div>


                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Tipo de Negócio</b></label>
                            <select class="selectpicker w-100" required name="tipo_negocio"  title="Selecione">
                                <option {{ ($imovel->tipo_negocio == 'Aluguel')?'selected':'' }}>Aluguel</option>
                                <option {{ ($imovel->tipo_negocio == 'Venda')?'selected':'' }}>Venda</option>
                            </select>
                        </div>


                        <div class="col-12 col-lg-12 col-xl-12 my-3">
                            <label class="text-muted"><b>Descrição do Imóvel</b></label>
                            <textarea name="descricao" required class="form-control" rows="5">{{ $imovel->descricao }}</textarea>
                        </div>

                        <div class="col-12 my-3">
                            <button type="submit" class="btn btn-info"><b>Próxima Etapa <i class="fas fa-arrow-right ml-1"></i></b></button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

        </div>

@endsection

