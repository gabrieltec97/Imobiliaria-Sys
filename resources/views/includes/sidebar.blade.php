<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">

</head>
<body>


<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4">
            <img src="{{ asset('site/img/logo.png') }}" class="img-fluid mt-3 mb-5">

            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fas fa-desktop mr-2"></i> <b>Página Inicial</b></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-shield mr-3"></i><b>Usuários</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <hr>
                        <a class="dropdown-item text-dark pl-3 mr-5" href="{{ route('usuarios') }}"><i class="far fa-address-card mr-2"></i> <b>Gerenciamento de Usuários</b></a>
                        <hr>
                        <a class="dropdown-item text-dark pl-3 mr-5" href="{{ route('novo-usuario') }}"><i class="fas fa-user-plus mr-2"></i> <b>Novo usuário</b></a>
                        <hr>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user pr-3"></i><b>Funcionários</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <hr>
                        <a class="dropdown-item text-dark pl-3 mr-5" href="{{ route('gerenciamento') }}"><i class="far fa-address-card mr-2"></i> <b>Gerenciamento de Funcionários</b></a>
                        <hr>
                        <a class="dropdown-item text-dark pl-3 mr-5" href="{{ route('administracao.create') }}"><i class="fas fa-user-plus mr-2"></i> <b>Novo Funcionário</b></a>
                        <hr>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-friends pr-3"></i><b>Clientes</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <hr>
                        <a class="dropdown-item text-dark pl-3 mr-5" href="{{ route('cliente.index') }}"><i class="far fa-address-card mr-2"></i> <b>Gerenciamento de Clientes</b></a>
                        <hr>
                        <a class="dropdown-item text-dark pl-3 mr-5" href="{{ route('cliente.create') }}"><i class="fas fa-user-plus mr-2"></i> <b>Novo Cliente</b></a>
                        <hr>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-home pr-3"></i><b>Imóveis</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <hr>
                        <a class="dropdown-item text-dark pl-3 mr-5" href="{{ route('gerenciamento-imoveis') }}"><i class="fas fa-tasks mr-3"></i><b>Gerenciamento de Imóveis</b></a>
                        <hr>
                        <a class="dropdown-item text-dark pl-3 mr-5" href="{{ route('imovel.create') }}"><i class="fas fa-book mr-3"></i><b>Cadastrar Imóveis</b></a>
                        <hr>
                        <a class="dropdown-item text-dark pl-3 mr-5" href="{{ route('buscar-imoveis') }}"><i class="fa fa-search mr-3"></i><b>Buscar Imóveis</b></a>
                        <hr>
                    </div>
                </li>

                <li>
                    <a href="{{ route('negocios_fechados.index') }}"><i class="fas fa-handshake mr-3"></i><b>Negócios Fechados</b></a>
                </li>

                <li>
                    <a href="{{ route('historico.index') }}"><i class="fas fa-h-square mr-3"></i><b>Histórico de Negócios</b></a>
                </li>



            </ul>

            <div class="mb-5">
                <h3 class="h6 mb-3 text-center"><b><?php

                        date_default_timezone_set('America/Sao_Paulo');
                        $agora =getdate();
                        $hora = $agora["hours"];

                        if($hora >= 0 && $hora <= 5){
                            echo "Boa noite,  ";
                        }elseif($hora >= 5 && $hora <= 12){
                            echo "Bom dia, ";
                        }elseif($hora >= 12 && $hora <= 18){
                            echo "Boa tarde,  ";
                        }else {
                            echo "Boa noite,  ";
                        }

                        $usuario = \Illuminate\Support\Facades\Auth::user()->name;

                        echo $usuario;

                        ?></b></h3>
                <a href="{{ route('logout') }}"><button class="btn btn-front w-100"><b>Sair</b></button></a>
            </div>

        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        @yield('content')
    </div>
</div>

<script src="https://kit.fontawesome.com/e656fe6405.js" crossorigin="anonymous"></script>
<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('site/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('site/defaults-pt_BR.js') }}"></script>

<script>
    $(document).ready(function(){
        $('#sidebarCollapse').on('click',function(){
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>

