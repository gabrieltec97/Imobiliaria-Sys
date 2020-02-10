<section class="topo bg-light">
    <div class="container-fluid py-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="{{ asset('site/img/logo.png') }}" class="logo" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="{{ route('inicio') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="{{ route('buscar-imoveis') }}">Buscar Imóveis</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="#">Área do Cliente</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="{{ route('contato') }}">Contato</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
