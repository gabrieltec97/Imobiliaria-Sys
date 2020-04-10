<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <script src="{{ asset('site/jquery.js') }}"></script>

</head>
<body class="body-adm">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light offset-lg-3 offset-md-2 card-login">
                <h5 class="card-header text-center text-muted login-h"><i class="fas fa-lock"></i>
                &nbsp;Autenticação</h5>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST" class="form-group">
                        @csrf
                        <div class="row">
                            <div class="col-1">
                                <i class="fas fa-user text-muted icone"></i>
                            </div>

                            <div class="col-10 col-md-11 mb-2">
                                <input type="text" name="email" id="senha" class="form-control login-input bg-light" placeholder="Username">
                            </div>

                            <div class="col-1 mt-4">
                                <i class="fas fa-key text-muted icone" ></i>
                            </div>

                            <div class="col-10 col-md-11">
                                <input type="password" name="password" class="form-control bg-light mt-4 login-input" id="senha2" placeholder="Password">
                            </div>

                            <div class="col-12 mt-4">
                                <p class="text-center"><button class="btn btn-info w-50 text-center font-weight-bold">Entrar</button></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(!empty($mensagem))
            <script>
                jQuery(document).ready(function(){

                     jQuery("#disparo").click();

                     jQuery("#close").mouseenter(function(){
                         jQuery("#close").toggleClass('one')
                    })

                     jQuery("#close").mouseleave(function(){
                         jQuery("#close").toggleClass('dual')
                    })

                     jQuery("#close").click(function(){
                        setTimeout(function(){
                             jQuery("#senha").toggleClass('test')
                            jQuery("#senha2").toggleClass('test')
                        }, 400)
                    })
                });
            </script>
        @endif
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn" hidden style="height: 0.1px; width: 0.1px;" data-toggle="modal" id="disparo" data-target="#exampleModalCenter"></button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F56857;">
                <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" style="background-color: #F56857;">
                <div class="text-center">
                    <img src="{{ asset('site/img/sad.png') }}" style="height: 50px; width 50px;" alt="">
                </div>
                <p class="text-white mt-3 font-weight-bold">Não foi possível fazer login, pois seu e-mail ou senha não estão corretos.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/e656fe6405.js" crossorigin="anonymous"></script>

<script src="{{ asset('site/bootstrap.js') }}"></script>
</body>
</html>
