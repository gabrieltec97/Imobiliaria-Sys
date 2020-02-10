@extends('includes.sidebar')

@section('title')
    Novo Usuário
    @endsection

   @section('content')

       <div class="col-12">
           <h1 class="text-muted text-center mb-3">Cadastro de novo usuário</h1>
       </div>

       @if(session('msg'))
           <div class="col-12">
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <p><b>{{ session('msg') }}</b></p>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
           </div>
       @endif

       <div class="container">
           <form action="{{ route('save-user') }}" method="post">
               @csrf
               <div class="card">
                   <div class="card-body card-cad">
                       <div class="row">
                           <div class="col-12 col-lg-6 col-xl-4 my-2">
                               <label class="text-muted"><b>Nome</b></label>
                               <input type="text" name="nome" class="form-control w-100" required placeholder="Insira apenas o nome.">
                           </div>

                           <div class="col-12 col-lg-6 col-xl-4 my-2">
                               <label class="text-muted"><b>Sobrenome</b></label>
                               <input type="text" name="sobrenome" class="form-control w-100" required placeholder="Insira o(s) sobrenome(s).">
                           </div>

                           <div class="col-12 col-lg-6 col-xl-4 my-2">
                               <label class="text-muted"><b>E-mail</b></label>
                               <input type="email" name="email" required class="form-control w-100">
                           </div>

                           <div class="col-12 col-lg-6 my-2">
                               <label class="text-muted"><b>Ocupação</b></label>
                               <select class="selectpicker w-100" name="ocupacao" required title="Informe o cargo do usuário">
                                   <option>Administrador</option>
                                   <option>Vendedor</option>
                                   <option>Recepcionista</option>
                               </select>
                           </div>

                           <div class="col-12 col-lg-6 my-2">
                               <label class="text-muted"><b>Senha</b></label>
                               <input type="text" name="senha" class="form-control w-100" required>
                           </div>

                           <div class="col-12 mt-4">
                               <button type="submit" class="btn btn-info"><i class="fas fa-user-plus mr-1"></i> <b>Cadastrar Usuário</b></button>
                           </div>
                       </div>
                   </div>
               </div>
           </form>
       </div>
   @endsection

