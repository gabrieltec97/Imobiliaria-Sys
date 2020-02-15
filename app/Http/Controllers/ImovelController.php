<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Contratos;
use App\Historico;
use App\Imovel;
use App\ImovelFotos;
use App\NegociosFechados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImovelController extends Controller
{

    public function index()
    {
        $imoveis = Imovel::all();
        $verificacao = 1;
        $valor = 35;

        return view('login.Imoveis.gerenciamento', compact('imoveis', 'verificacao', 'valor'));
    }

    public function front()
    {
        return redirect(route('gerenciamento-imoveis'))->with('msg', 'Anúncio alterado com sucesso!');
    }

    public function create()
    {
        return view('login.Imoveis.cadastrar');
    }


    public function store(Request $request)
    {
        $imovel = new Imovel();

        $imovel->nome = $request->nome;
        $imovel->endereco = $request->endereco;
        $imovel->cep = $request->cep;
        $imovel->cidade = $request->cidade;
        $imovel->estado = $request->estado;
        $imovel->tipo_imovel = $request->tipo_imovel;
        $imovel->qt_quartos = $request->qt_quartos;
        $imovel->qt_suites = $request->qt_suites;
        $imovel->vagas_garagem = $request->vagas;
        $imovel->tx_condominio = $request->tx_cond;
        $imovel->tipo_negocio = $request->t_negocio;
        $imovel->valor = $request->valor;
        $imovel->status = $request->status;
        $imovel->descricao = $request->descricao;
        $imovel->save();

        return redirect(route('imovel-fotos', $imovel->id))->with('msg', 'Seu anúncio está quase pronto. Agora selecione as imagens que deseja colocar no anúncio.');
    }


    public function capturarFotos(Request $request, $id)
    {
        $id = $request->id;
        return view('login.Imoveis.cadastrar-fotos', compact('id'));
    }


    public function storeFotos(Request $request, $id)
    {

        if ($_FILES['fotos']['name'][0] == ''){
            return redirect(route('gerenciamento-imoveis'))->with('msg', 'Imóvel cadastrado com sucesso, porém sem fotos!');
        }else{
            //De onde o arquivo vem e para onde ele vai.
            $arquivo = $_FILES['fotos'];

            $diretorio = "storage/images";

            //Estrutura para rodar quantas vezes for conforme a quantidade de fotos.
            for ($controle = 0; $controle < count($arquivo['name']); $controle++){

                $nome = $diretorio . "/" . rand() . $arquivo['name'][$controle];

                //Salvando as fotos.
                $fotos = new ImovelFotos();

                $fotos->id_anuncio = $request->id;
                $fotos->foto_anuncio = $nome;
                $fotos->nome_original = $arquivo['name'][$controle];
                $fotos->save();

                //Movendo as fotos.
                $destino = $nome;

                move_uploaded_file($arquivo['tmp_name'][$controle], $destino);
            }
        }

        return redirect(route('gerenciamento-imoveis'))->with('msg', 'Imóvel cadastrado com sucesso!');
    }


    public function show($id)
    {
        $imovel = Imovel::find($id);
        $imagens = DB::table('imovel_fotos')->selectRaw('foto_anuncio')
            ->whereRaw('id_anuncio = '. $id)->get();


        return view('login.Imoveis.imovel', compact('imagens', 'imovel'));
    }


    public function edit($id)
    {
        $imovel = Imovel::find($id);

        return view('login.Imoveis.edicao-imovel', compact('imovel'));
    }


    public function update(Request $request, $id)
    {

            $imovel = Imovel::find($id);

            $imovel->nome = $request->nome ;
            $imovel->cep = $request->cep ;
            $imovel->endereco = $request->endereco ;
            $imovel->cidade = $request->cidade ;
            $imovel->estado = $request->estado ;
            $imovel->tipo_imovel = $request->tipo_imovel ;
            $imovel->qt_quartos = $request->qt_quartos ;
            $imovel->qt_suites = $request->qt_suites ;
            $imovel->vagas_garagem = $request->vagas_garagem ;
            $imovel->tx_condominio = $request->tx_condominio ;
            $imovel->tipo_negocio = $request->tipo_negocio ;
            $imovel->valor = $request->valor ;
            $imovel->status = $request->status ;
            $imovel->descricao = $request->descricao ;
            $imovel->save();

            return redirect(route('update-fotos', $id));
        }

    public function updateFotos($id)
    {
        $imagens = DB::table('imovel_fotos')->selectRaw('nome_original')
            ->selectRaw('id')
            ->whereRaw('id_anuncio = '. $id)->get();

        return view('login.Imoveis.edicao-fotos-imovel', compact('id', 'imagens'));
    }

    public function newUpload(Request $request, $id)
    {

        //De onde o arquivo vem e para onde ele vai.
        $arquivo = $_FILES['fotos'];

        $diretorio = "storage/images";

        //Estrutura para rodar quantas vezes for conforme a quantidade de fotos.
        for ($controle = 0; $controle < count($arquivo['name']); $controle++){

            $nome = $diretorio . "/" . rand() . $arquivo['name'][$controle];

            //Salvando as fotos.
            $fotos = new ImovelFotos();

            $fotos->id_anuncio = $id;
            $fotos->foto_anuncio = $nome;
            $fotos->nome_original = $arquivo['name'][$controle];
            $fotos->save();

            //Movendo as fotos.
            $destino = $nome;

            move_uploaded_file($arquivo['tmp_name'][$controle], $destino);
        }


        return redirect(route('update-fotos', $id))->with('msg', 'Imagem adicionada com sucesso!');
    }

    public function exclusaoEdicaoFotos($id)
    {
        $imagem = ImovelFotos::find($id);
        $imagem->delete();

        File::delete($imagem->foto_anuncio);

        return redirect(route('update-fotos', $imagem->id_anuncio))->with('msg-2', 'Imagem deletada com sucesso!');
    }


    public function destroy($id)
    {
        $imovel = Imovel::find($id);
        $imovel->delete();

        $fotos = DB::table('imovel_fotos')->whereRaw('id_anuncio = ' . $imovel->id)->get();

        foreach ($fotos as $foto){
            ImovelFotos::destroy($foto->id);
            File::delete($foto->foto_anuncio);
        }

        return redirect(route('gerenciamento-imoveis'))->with('msg-2', 'Anúncio deletado com sucesso!');
    }

    public function deletarTudo($id)
    {
        $fotos = DB::table('imovel_fotos')->whereRaw('id_anuncio = ' . $id)->get();

        foreach ($fotos as $foto){
            ImovelFotos::destroy($foto->id);
            File::delete($foto->foto_anuncio);
        }

        return redirect(route('update-fotos', $id))->with('msg-3', 'Todas as imagens foram deletadas com sucesso!');
    }

    public function pesquisa(Request $request)
    {

        if($request->tipo_imovel == '' or $request->cidade == ''){

            return redirect(route('gerenciamento-imoveis'));
        }else {
            $imoveis = DB::table('imovels')
                ->where('tipo_imovel', '=', $request->tipo_imovel)
                ->where('cidade', '=', $request->cidade)->get();

            $ver = 1;
            $verificacao = 2;

            if (count($imoveis) == 0){
                $valor = 0;
            }else {
                $valor =1;
            }

            return view('login.Imoveis.gerenciamento', compact('imoveis', 'ver', 'valor', 'verificacao'));
        }
    }

    public function negociar($id)
    {
        $imovel = Imovel::find($id);
        $clientes = Cliente::all();

        return view('login.Imoveis.negociacao', compact('imovel', 'clientes'));

    }

    public function fecharNegocio(Request $request, $id)
    {
        $imovel = Imovel::find($id);
        $nome = Auth::user()->name;
        $sobrenome = Auth::user()->surname;
        $nomeCompleto = $nome . ' ' . $sobrenome;

        /*Movendo o imóvel para negócios fechados e informando o imóvel
        que está sendo negociado, status e observações.*/
        if ($imovel->status == 'Disponível para aluguel'){

            $imovel = Imovel::find($id);
            $novoRegistro = new NegociosFechados();

            $novoRegistro->cliente_responsavel = $request->cliente;
            $novoRegistro->imovel_negociado = $imovel->id;
            $novoRegistro->negociado_em = $request->negociado_em;
            $novoRegistro->negociado_por = $nomeCompleto;
            $novoRegistro->status_pagamento = $request->status_pagamento;
            $novoRegistro->observacoes = $request->observacoes;
            $novoRegistro->nome = $imovel->nome;
            $novoRegistro->cep = $imovel->cep;
            $novoRegistro->endereco = $imovel->endereco;
            $novoRegistro->cidade = $imovel->cidade;
            $novoRegistro->estado = $imovel->estado;
            $novoRegistro->tipo_imovel = $imovel->tipo_imovel;
            $novoRegistro->qt_quartos = $imovel->qt_quartos;
            $novoRegistro->qt_suites = $imovel->qt_suites;
            $novoRegistro->vagas_garagem = $imovel->vagas_garagem;
            $novoRegistro->tx_condominio = $imovel->tx_condominio;
            $novoRegistro->tipo_negocio = $imovel->tipo_negocio;
            $novoRegistro->valor = $imovel->valor;
            $novoRegistro->status = 'Alugado';
            $novoRegistro->descricao = $imovel->descricao;
            $novoRegistro->save();

            $imovel->delete();

            //Inserindo este novo cadastro no histórico.
            $historico = new Historico();

            $historico->cliente_responsavel = $request->cliente;
            $historico->imovel_negociado = $imovel->id;
            $historico->negociado_em = $request->negociado_em;
            $historico->negociado_por = $nomeCompleto;
            $historico->status_pagamento = $request->status_pagamento;
            $historico->observacoes = $request->observacoes;
            $historico->save();

        }
        elseif($imovel->status == 'Disponível para venda'){

            $imovel = Imovel::find($id);
            $novoRegistro = new NegociosFechados();

            $novoRegistro->cliente_responsavel = $request->cliente;
            $novoRegistro->imovel_negociado = $imovel->id;
            $novoRegistro->negociado_em = $request->negociado_em;
            $novoRegistro->negociado_por = $nomeCompleto;
            $novoRegistro->status_pagamento = $request->status_pagamento;
            $novoRegistro->observacoes = $request->observacoes;
            $novoRegistro->id = $imovel->id;
            $novoRegistro->nome = $imovel->nome;
            $novoRegistro->cep = $imovel->cep;
            $novoRegistro->endereco = $imovel->endereco;
            $novoRegistro->cidade = $imovel->cidade;
            $novoRegistro->estado = $imovel->estado;
            $novoRegistro->tipo_imovel = $imovel->tipo_imovel;
            $novoRegistro->qt_quartos = $imovel->qt_quartos;
            $novoRegistro->qt_suites = $imovel->qt_suites;
            $novoRegistro->vagas_garagem = $imovel->vagas_garagem;
            $novoRegistro->tx_condominio = $imovel->tx_condominio;
            $novoRegistro->tipo_negocio = $imovel->tipo_negocio;
            $novoRegistro->valor = $imovel->valor;
            $novoRegistro->status = 'Vendido';
            $novoRegistro->descricao = $imovel->descricao;
            $novoRegistro->save();

            $imovel->delete();

            //Inserindo este novo cadastro no histórico.
            $historico = new Historico();

            $historico->cliente_responsavel = $request->cliente;
            $historico->imovel_negociado = $imovel->id;
            $historico->negociado_em = $request->negociado_em;
            $historico->negociado_por = $nomeCompleto;
            $historico->status_pagamento = $request->status_pagamento;
            $historico->observacoes = $request->observacoes;
            $historico->save();
        }

        return redirect(route('anexar-contrato', $novoRegistro->id));
    }

    public function anexarContrato($id)
    {
        return view('login.Imoveis.contrato', compact('id'));
    }

    public function uploadContrato($id)
    {
        //De onde o arquivo vem e para onde ele vai.
        $arquivo = $_FILES['contratos'];

        $diretorio = "storage/contratos";

        //Estrutura para rodar quantas vezes for conforme a quantidade de fotos.
        for ($controle = 0; $controle < count($arquivo['name']); $controle++){

            $nome = $diretorio . "/" . rand() . $arquivo['name'][$controle];

            //Salvando as fotos.
            $fotos = new Contratos();

            $fotos->id_negocio = $id;
            $fotos->foto_contrato = $nome;
            $fotos->nome_original_foto_contrato = $arquivo['name'][$controle];
            $fotos->save();

            //Movendo as fotos.
            $destino = $nome;

            move_uploaded_file($arquivo['tmp_name'][$controle], $destino);
        }

        return redirect(route('negocios_fechados.index'))->with('msg', 'Negócio fechado com sucesso!');
    }

}

/*O método de desfazer contrato e cadastrar novo cliente no processo de fechamento de negócio ficou
no NegócioController para evitar sobrecarga neste controlador.*/
