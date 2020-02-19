@extends('home')

@section('content')

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h1 class="text-front text-center">Entre em contato conosco</h1>
                    <p class="text-muted text-center"><b>Quer conversar com um corretor exclusivo e ter o atendimento diferenciado em busca do seu imóvel
                            dos sonhos?<br>Preencha o formulário abaixo e vamos lhe direcionar para alguém que entende a
                            sua necessidade!</b></p>
                </div>

               @if(session('msg'))
                    <div class="col-12 mb-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h6 class="font-weight-bold">{{ session('msg') }}</h6>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

                <div class="col-12 col-lg-6 offset-lg-3">
                    <form action="{{ route('contato-email') }}" class="form-group">
                        @csrf
                        <h5 class="text-muted"><i class="far fa-envelope"></i> &nbsp;Envie um e-mail</h5>
                        <input type="text" class="form-control my-3 w-100" name="nome" placeholder="Insira seu nome">
                        <input type="email" class="form-control my-3 w-100" name="email" placeholder="Insira seu e-mail">
                        <input type="number" class="form-control my-3 w-100" name="telefone" placeholder="Insira seu telefone com DDD">
                        <textarea rows="5" class="form-control my-3 w-100" name="mensagem" placeholder="Escreva sua mensagem..."></textarea>
                        <button class="btn btn-front mb-4 font-weight-bold" style="float: right">Enviar e-mail</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
