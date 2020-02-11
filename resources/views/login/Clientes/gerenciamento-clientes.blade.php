@extends('includes.sidebar')

@section('title')
    Gerenciamento de Clientes
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-center text-muted mt-1">Lista de Clientes</h1>
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
        @if(session('msg-3'))
            <div class="col-12 mt-2">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p><b>{{ session('msg-3') }}</b></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h6 class="text-muted"><b>Busca rápida</b></h6>
                <form action="{{ route('pesquisar-cliente') }}" class="form-group">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <input type="text" name="nome" class="form-control bg-light my-3 my-md-0" value="{{ isset($_GET['nome'] ) ? $_GET['nome'] : '' }}" placeholder="Digite o nome do cliente">
                        </div>

                        <div class="col-12 col-lg-5">
                            <button class="btn btn-custom font-weight-bold"><i class="fas fa-search mr-2"></i>Buscar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12">
                <table class="table table-striped bg-white table-hover table-responsive-lg">
                    <thead class="border">
                    <tr class="border">
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Imóvel Negociado</th>
                    </tr>
                    </thead>
                    <tbody class="border">
                    @foreach($clientes as $cliente)
                        <tr>
                            <th class="text-muted font-weight-bold"><a href="{{ route('cliente.show', $cliente->id) }}">{{ $cliente->nome }}</a></th>
                            <td class="text-muted font-weight-bold"><a href="{{ route('cliente.show', $cliente->id) }}">{{ $cliente->telefone }}</a></td>
                            <td class="text-muted font-weight-bold"><a href="{{ route('cliente.show', $cliente->id) }}">{{ $cliente->email }}</a></td>

                            @if($cliente->imovel_negociado == null)
                            <th class="text-muted font-weight-bold">Este cliente ainda não possui nenhum imóvel</th>
                            @else
                               <td class="text-muted font-weight-bold"><a href="{{ route('imovel.show', $cliente->id) }}">{{ $cliente->imovel_negociado }}</a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if(count($clientes) == 0 && $verificacao == 1)
                    <h6><strong>Nenhum cliente foi cadastrado ainda.<a href="{{ route('cliente.create') }}" class="text-primary">
                            Clique aqui
                        </a> para cadastrar um novo cliente.</strong></h6>
                @endif

                    @if($valor == 0)
                        <h6><strong>Não foi encontrado nenhum cliente com este nome.</strong></h6>
                   @endif
            </div>
        </div>
    </div>



@endsection
