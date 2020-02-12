@extends('includes.sidebar')

@section('title')
    Salvamento de contrato.
@endsection

@section('content')

    <div class="col-12">
        <h1 class="text-muted text-center mb-3">Inserção de contrato</h1>
    </div>

    @if(session('msg'))
        <div class="col-12 mt-1">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <p><b>{{ session('msg') }}</b></p>
            </div>
        </div>
    @endif

    <div class="container">
        <form id="form" action="{{ route('upload-contrato', $id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body card-cad">
                    <div class="row">
                        <div class="col-12 my-3">
                            <h5 class="text-muted"><b>Insira o contrato do negócio</b> <br></h5>
                            <input type="file" multiple="multiple" name="contratos[]" class="mt-3">
                        </div>


                        <div class="col-12 mt-4 mb-3">
                            <button type="submit" class="btn btn-info"><b><i class="fas fa-check mr-2"></i>Finalizar Negócio</b></button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
