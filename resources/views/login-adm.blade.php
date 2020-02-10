<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">

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
                                <input type="text" name="email" class="form-control login-input bg-light" placeholder="Username">
                            </div>

                            <div class="col-1 mt-4">
                                <i class="fas fa-key text-muted icone" ></i>
                            </div>

                            <div class="col-10 col-md-11">
                                <input type="password" name="password" class="form-control bg-light mt-4 login-input" placeholder="Password">
                            </div>

                            <div class="col-12 mt-4">
                                <p class="text-center"><button class="btn btn-info w-50 text-center">Entrar</button></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(!empty($mensagem))
            <div class="col-12 col-md-6 offset-md-3 mt-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Atenção!</strong> Acesso negado. Verifique as credenciais de entrada.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>

<script src="https://kit.fontawesome.com/e656fe6405.js" crossorigin="anonymous"></script>
<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
</body>
</html>
