@extends('includes.sidebar')

@section('title')
    Gerenciamento de Funcionários
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-center text-muted mt-1">Listagem de Funcionários</h1>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dados as $dado)
                        <tr>
                            <th class="text-muted font-weight-bold">{{ $dado->id }}</th>
                            <td class="text-muted font-weight-bold"><a href="{{ route('administracao.show', $dado->id) }}"> {{ $dado->nome }}</a></td>
                            <td class="text-muted font-weight-bold">{{ $dado->endereco }}</td>
                            <td class="text-muted font-weight-bold">{{ $dado->cpf }}</td>
                            <td class="text-muted font-weight-bold">{{ $dado->telefone }}</td>
                            <td class="text-muted font-weight-bold">{{ $dado->cargo }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <a href="{{ route('administracao.edit', $dado->id) }}"><i class="fas fa-user-edit text-info mr-3" style="font-size: 25px"></i></a>
                                    </div>

                                    <div class="col-4">
                                        <form action="{{ route('administracao.destroy', $dado->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: none; border:none;">
                                                <i class="fas fa-trash text-danger" style="font-size: 25px"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>


        @if(session('msg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p><b>{{ session('msg') }}</b></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('d-msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><b>{{ session('d-msg') }}</b></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    @endsection
