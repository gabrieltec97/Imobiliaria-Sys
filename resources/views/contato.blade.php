@extends('home')

@section('content')

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <h1 class="text-front text-center">Entre em contato conosco</h1>
                    <p class="text-muted text-center"><b>Quer conversar com um corretor exclusivo e ter o atendimento diferenciado em busca do seu imóvel
                            dos sonhos?<br>Preencha o formulário abaixo e vamos lhe direcionar para alguém que entende a
                            sua necessidade!</b></p>

                </div>

                <div class="col-12 col-lg-6 offset-lg-3">
                    <form action="#" class="form-group">
                        @csrf
                        <h5 class="text-muted"><i class="far fa-envelope"></i> &nbsp;Envie um e-mail</h5>
                        <input type="text" class="form-control my-3 w-100" placeholder="Insira seu nome">
                        <input type="email" class="form-control my-3 w-100" placeholder="Insira seu e-mail">
                        <input type="number" class="form-control my-3 w-1000" placeholder="Insira seu telefone com DDD">
                        <textarea rows="5" class="form-control my-3 w-100" placeholder="Escreva sua mensagem..."></textarea>
                        <button class="btn btn-front mb-4" style="float: right">Enviar e-mail</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
