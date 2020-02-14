@extends('includes.sidebar')

@section('title')
    Edição de Cadastro de Imóvel
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Alteração de cadastro</h1>
    </div>

    <div class="container conteudo_cad">
        <form id="form" action="{{ route('negocios_fechados.update', $negocio->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body card-cad">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Título do Anúncio</b></label>
                            <input type="text" name="nome" class="form-control w-100" required value=" {{ $negocio->nome }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Cep</b></label>
                            <input type="number" name="cep" required  class="form-control w-100" value="{{ $negocio->cep }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Endereço</b></label>
                            <input type="text" name="endereco" required class="form-control w-100" value=" {{ $negocio->endereco }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Cidade</b></label>
                            <input type="text" name="cidade" required class="form-control w-100" value=" {{ $negocio->cidade }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Estado</b></label>
                            <select class="selectpicker w-100" name="estado" required  title="Selecione">
                                <option value="AC" {{ ($negocio->estado == 'AC')?'selected':'' }}>Acre</option>
                                <option value="AL" {{ ($negocio->estado == 'AL')?'selected':'' }}>Alagoas</option>
                                <option value="AP" {{ ($negocio->estado == 'AP')?'selected':'' }}>Amapá</option>
                                <option value="AM" {{ ($negocio->estado == 'AM')?'selected':'' }}>Amazonas</option>
                                <option value="BA" {{ ($negocio->estado == 'BA')?'selected':'' }}>Bahia</option>
                                <option value="CE" {{ ($negocio->estado == 'CE')?'selected':'' }}>Ceará</option>
                                <option value="DF" {{ ($negocio->estado == 'DF')?'selected':'' }}>Distrito Federal</option>
                                <option value="ES" {{ ($negocio->estado == 'ES')?'selected':'' }}>Espírito Santo</option>
                                <option value="GO" {{ ($negocio->estado == 'GO')?'selected':'' }}>Goiás</option>
                                <option value="MA" {{ ($negocio->estado == 'MA')?'selected':'' }}>Maranhão</option>
                                <option value="MT" {{ ($negocio->estado == 'MT')?'selected':'' }}>Mato Grosso</option>
                                <option value="MS" {{ ($negocio->estado == 'MS')?'selected':'' }}>Mato Grosso do Sul</option>
                                <option value="MG" {{ ($negocio->estado == 'MG')?'selected':'' }}>Minas Gerais</option>
                                <option value="PA" {{ ($negocio->estado == 'PA')?'selected':'' }}>Pará</option>
                                <option value="PB" {{ ($negocio->estado == 'PB')?'selected':'' }}>Paraíba</option>
                                <option value="PR" {{ ($negocio->estado == 'PR')?'selected':'' }}>Paraná</option>
                                <option value="PE" {{ ($negocio->estado == 'PE')?'selected':'' }}>Pernambuco</option>
                                <option value="PI" {{ ($negocio->estado == 'PI')?'selected':'' }}>Piauí</option>
                                <option value="RJ" {{ ($negocio->estado == 'RJ')?'selected':'' }}>Rio de Janeiro</option>
                                <option value="RN" {{ ($negocio->estado == 'RN')?'selected':'' }}>Rio Grande do Norte</option>
                                <option value="RS" {{ ($negocio->estado == 'RS')?'selected':'' }}>Rio Grande do Sul</option>
                                <option value="RO" {{ ($negocio->estado == 'RO')?'selected':'' }}>Rondônia</option>
                                <option value="RR" {{ ($negocio->estado == 'RR')?'selected':'' }}>Roraima</option>
                                <option value="SC" {{ ($negocio->estado == 'SC')?'selected':'' }}>Santa Catarina</option>
                                <option value="SP" {{ ($negocio->estado == 'SP')?'selected':'' }}>São Paulo</option>
                                <option value="SE" {{ ($negocio->estado == 'SE')?'selected':'' }}>Sergipe</option>
                                <option value="TO" {{ ($negocio->estado == 'TO')?'selected':'' }}>Tocantins</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Tipo de Imóvel</b></label>
                            <select class="selectpicker w-100" required name="tipo_imovel"  title="Selecione">
                                <option {{ ($negocio->tipo_imovel == 'Casa')?'selected':'' }}>Casa</option>
                                <option {{ ($negocio->tipo_imovel == 'Apartamento')?'selected':'' }}>Apartamento</option>
                                <option {{ ($negocio->tipo_imovel == 'Quitinete')?'selected':'' }}>Quitinete</option>
                                <option {{ ($negocio->tipo_imovel == 'Casa de Condomínio')?'selected':'' }}>Casa de Condomínio</option>
                                <option {{ ($negocio->tipo_imovel == 'Hostel')?'selected':'' }}>Hostel</option>
                                <option {{ ($negocio->tipo_imovel == 'Sala de Escritório')?'selected':'' }}>Sala de Escritório</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Quantidade de Quartos</b></label>
                            <select class="selectpicker w-100" required name="qt_quartos"  title="Selecione">
                                <option {{ ($negocio->qt_quartos == 'Não possui')?'selected':'' }}>Não possui</option>
                                <option {{ ($negocio->qt_quartos == '1')?'selected':'' }}>1</option>
                                <option {{ ($negocio->qt_quartos == '2')?'selected':'' }}>2</option>
                                <option {{ ($negocio->qt_quartos == '3')?'selected':'' }}>3</option>
                                <option {{ ($negocio->qt_quartos == '4')?'selected':'' }}>4</option>
                                <option {{ ($negocio->qt_quartos == '5')?'selected':'' }}>5</option>
                                <option {{ ($negocio->qt_quartos == '6')?'selected':'' }}>6</option>
                                <option {{ ($negocio->qt_quartos == '7')?'selected':'' }}>7</option>
                                <option {{ ($negocio->qt_quartos == '8')?'selected':'' }}>8</option>
                                <option {{ ($negocio->qt_quartos == '9')?'selected':'' }}>9</option>
                                <option {{ ($negocio->qt_quartos == '10')?'selected':'' }}>10</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Quantidade de Suítes</b></label>
                            <select class="selectpicker w-100" required name="qt_suites"  title="Selecione">
                                <option {{ ($negocio->qt_suites == 'Não possui')?'selected':'' }}>Não possui</option>
                                <option {{ ($negocio->qt_suites == '1')?'selected':'' }}>1</option>
                                <option {{ ($negocio->qt_suites == '2')?'selected':'' }}>2</option>
                                <option {{ ($negocio->qt_suites == '3')?'selected':'' }}>3</option>
                                <option {{ ($negocio->qt_suites == '4')?'selected':'' }}>4</option>
                                <option {{ ($negocio->qt_suites == '5')?'selected':'' }}>5</option>
                                <option {{ ($negocio->qt_suites == '6')?'selected':'' }}>6</option>
                                <option {{ ($negocio->qt_suites == '7')?'selected':'' }}>7</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Vagas de garagem</b></label>
                            <select class="selectpicker w-100" required name="vagas_garagem"  title="Selecione">
                                <option {{ ($negocio->vagas_garagem == 'Não possui')?'selected':'' }}>Não possui</option>
                                <option {{ ($negocio->vagas_garagem == '1')?'selected':'' }}>1</option>
                                <option {{ ($negocio->vagas_garagem == '2')?'selected':'' }}>2</option>
                                <option {{ ($negocio->vagas_garagem == '3')?'selected':'' }}>3</option>
                                <option {{ ($negocio->vagas_garagem == '4')?'selected':'' }}>4</option>
                                <option {{ ($negocio->vagas_garagem == '5')?'selected':'' }}>5</option>
                                <option {{ ($negocio->vagas_garagem == '6')?'selected':'' }}>6</option>
                                <option {{ ($negocio->vagas_garagem == 'Superior a 6')?'selected':'' }}>Superior a 6</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Taxa de Condomínio</b></label>
                            <input type="number" name="tx_condominio" required class="form-control w-100" value="{{ $negocio->tx_condominio }}">
                        </div>



                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Valor</b></label>
                            <input type="number" name="valor" required class="form-control w-100" value="{{ $negocio->valor }}">
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4 my-3">
                            <label class="text-muted"><b>Status de pagamento</b></label>
                            <select name="status_pagamento" class="selectpicker w-100">
                                <option {{ ($negocio->status_pagamento == 'Pago')?'selected':'' }}>Pago</option>
                                <option {{ ($negocio->status_pagamento == 'Aguardando pagamento')?'selected':'' }}>Aguardando pagamento</option>
                                <option {{ ($negocio->status_pagamento == 'Mensalidades em dia')?'selected':'' }}>Mensalidades em dia</option>
                                <option {{ ($negocio->status_pagamento == 'Atrasado')?'selected':'' }}>Atrasado</option>
                            </select>
                        </div>

                        <div class="col-12 my-3">
                            <label class="text-muted"><b>Observações</b></label>
                            <textarea name="observacoes" class="form-control" rows="5">{{ $negocio->observacoes }}</textarea>
                        </div>


                        <div class="col-12 col-lg-12 col-xl-12 my-3">
                            <label class="text-muted"><b>Descrição do Imóvel</b></label>
                            <textarea name="descricao" required class="form-control" rows="5">{{ $negocio->descricao }}</textarea>
                        </div>

                        <div class="col-12 mt-3">
                            <button class="btn btn-success float-right font-weight-bold" type="submit"><i class="fas fa-check mr-2"></i>Salvar alterações</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    </div>

@endsection

