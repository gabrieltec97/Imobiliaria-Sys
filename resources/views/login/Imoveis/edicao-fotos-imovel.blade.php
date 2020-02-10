@extends('includes.sidebar')

@section('title')
    Atualização de Imagens
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Seleção de Imagens</h1>
    </div>

        <div class="col-12 mt-1">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <p><b>Aqui abaixo estão as imagens do imóvel que foram
                        cadastradas anteriormente, você pode mantê-las ou removê-las, e também pode adicionar mais imagens.
                        <br>Caso deseje finalizar a edição sem alterar as imagens, clique em Salvar Alterações ao final da página.</b></p>
            </div>
        </div>


    <div class="container">
    <div class="row">
       <div class="col-12">
           <form id="form" action="{{ route('new-upload', $id) }}" method="post" enctype="multipart/form-data">
           @csrf
           <div class="card">
               <div class="card-body card-cad">
                   <div class="row">
                       <div class="col-12 my-3">
                           <h5 class="text-muted"><b>Adicionar mais imagens ao anúncio</b> <br></h5>
                           <input type="file" multiple="multiple" name="fotos[]" required class="mt-3">
                       </div>

                       <div class="col-12 mt-4 mb-3">
                           <button type="submit" class="btn btn-info"><b><i class="fas fa-check mr-2"></i>Enviar fotos</b></button>
                       </div>

                   </div>
               </div>
           </div>
           </form>
       </div>
    </div>

        <div class="row">
            @if(session('msg'))
                <div class="col-12 mt-3">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p><b>{{ session('msg') }}</b></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

                @if(session('msg-2'))
                    <div class="col-12 mt-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p><b>{{ session('msg-2') }}</b></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

                @if(session('msg-3'))
                    <div class="col-12 mt-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p><b>{{ session('msg-3') }}</b></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
        </div>


       <div class="row">
           <div class="col-12">
                   <div class="card mt-3">
                       <div class="card-body card-cad">
                           <div class="row">
                               <div class="col-12 my-3">
                                   <h5 class="text-muted"><b>Imagens já cadastradas:</b></h5>

                                   <table class="table table-bordered table-responsive-lg mt-4">
                                       <thead>
                                       <tr>
                                           <th scope="col" class="text-muted">Nome da Imagem</th>
                                           <th scope="col" class="text-muted">Ação</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                       @foreach($imagens as $key => $imagem)
                                            <tr>
                                                <th>{{ $imagem->nome_original }}</th>

                                                <th>
                                                    <form action="{{ route('exclusao-edicao-fotos', $imagem->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Excluir</button>
                                                    </form>
                                                </th>
                                            </tr>
                                       @endforeach
                                       </tbody>
                                   </table>

                                   @if(count($imagens) == 0)
                                       <h6 class="text-danger mt-2">Seu anúncio está sem fotos. É aconselhável que você adicione fotos para uma melhor
                                       visualização do anúncio.</h6>
                                       @endif
                               </div>

                               <div class="col-12">
                                   <form action="{{ route('deletar-tudo', $id) }}" method="post">
                                       @csrf
                                       <button class="btn btn-danger float-right"><i class="fas fa-exclamation-triangle mr-2"></i>Deletar todas as imagens</button>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
            </div>
       </div>

        <div class="row">
            <div class="col-12 mt-4">
                <a href="{{ route('redirecionamento') }}" class="btn btn-success font-weight-bold text-white float-right"><i class="fas fa-check-circle mr-2"></i>Salvar Alterações</a>
            </div>
        </div>
    </div>



@endsection

