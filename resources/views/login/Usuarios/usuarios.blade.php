@extends('includes.sidebar')

@section('title')
    Gerenciamento de Usuários
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-center text-muted mt-1">Listagem de usuários</h1>
    </div>

    <div class="container bg-light">
        <div class="row mt-5">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Login</th>
                        <th scope="col">Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($dados as $dado)
                       <tr>
                           <th scope="row">{{ $dado->id }}</th>
                           <td>{{ $dado->name }} {{ $dado->surname }}</td>
                           <td>{{ $dado->email }}</td>
                           <td>{{ $dado->occupation }}</td>
                           <td>
                               <div class="row">
                                   <div class="col-3">
                                       <a href="{{ route('edicao.edit', $dado->id) }}"><i class="fas fa-user-edit text-info mr-3" style="font-size: 25px"></i></a>
                                   </div>

                                   <div class="col-4">
                                       <form action="{{ route('edicao.destroy', $dado->id) }}" method="post">
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
    </div>
    @if(session('msg'))
        <div class="col-12 mt-5">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p><b>{{ session('msg') }}</b></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    @if(session('msg-2'))
        <div class="col-12 mt-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p><b>{{ session('msg-2') }}</b></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
@endsection
