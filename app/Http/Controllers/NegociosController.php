<?php

namespace App\Http\Controllers;

use App\Imovel;
use App\Negocios_Clientes;
use App\NegociosFechados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NegociosController extends Controller
{
    public function index()
    {
        $imoveis = NegociosFechados::all();
        $verificacao = 1;
        $valor = 35;

        return view('login.Negocios.gerenciamento-negocios', compact('imoveis', 'valor', 'verificacao'));
    }


    public function pesquisaNegocios(Request $request)
    {
        if($request->tipo_imovel == '' or $request->cidade == ''){

            return redirect(route('negocios-fechados'));
        }else {
            $imoveis = DB::table('negocios_fechados')
                ->where('tipo_imovel', '=', $request->tipo_imovel)
                ->where('cidade', '=', $request->cidade)->get();

            $ver = 1;
            $verificacao = 2;

            if (count($imoveis) == 0){
                $valor = 0;
            }else {
                $valor = 1;
            }

            return view('login.Negocios.gerenciamento-negocios', compact('imoveis', 'ver', 'valor', 'verificacao'));
        }
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $imovel = NegociosFechados::find($id);
        $imagens = DB::table('imovel_fotos')->selectRaw('foto_anuncio')
            ->whereRaw('id_anuncio = '. $id)->get();

        return view('login.Negocios.imovel-alugado', compact('imovel', 'imagens'));
    }



    public function retornar(Request $request, $id)
    {
        $imovelNegocio = NegociosFechados::find($id);

        if ($imovelNegocio->status == 'Alugado'){

            $imovel = new Imovel();

            $imovel->id = $imovelNegocio->id;
            $imovel->nome = $imovelNegocio->nome;
            $imovel->endereco = $imovelNegocio->endereco;
            $imovel->cep = $imovelNegocio->cep;
            $imovel->cidade = $imovelNegocio->cidade;
            $imovel->estado = $imovelNegocio->estado;
            $imovel->tipo_imovel = $imovelNegocio->tipo_imovel;
            $imovel->qt_quartos = $imovelNegocio->qt_quartos;
            $imovel->qt_suites = $imovelNegocio->qt_suites;
            $imovel->vagas_garagem = $imovelNegocio->vagas_garagem;
            $imovel->tx_condominio = $imovelNegocio->tx_condominio;
            $imovel->tipo_negocio = $imovelNegocio->tipo_negocio;
            $imovel->valor = $imovelNegocio->valor;
            $imovel->status = 'Disponível para aluguel';
            $imovel->descricao = $imovelNegocio->descricao;
            $imovel->save();

            $imovelNegocio->delete();

        }
        elseif($imovelNegocio->status == 'Vendido'){

            $imovel = new Imovel();

            $imovel->nome = $imovelNegocio->nome;
            $imovel->endereco = $imovelNegocio->endereco;
            $imovel->cep = $imovelNegocio->cep;
            $imovel->cidade = $imovelNegocio->cidade;
            $imovel->estado = $imovelNegocio->estado;
            $imovel->tipo_imovel = $imovelNegocio->tipo_imovel;
            $imovel->qt_quartos = $imovelNegocio->qt_quartos;
            $imovel->qt_suites = $imovelNegocio->qt_suites;
            $imovel->vagas_garagem = $imovelNegocio->vagas_garagem;
            $imovel->tx_condominio = $imovelNegocio->tx_condominio;
            $imovel->tipo_negocio = $imovelNegocio->tipo_negocio;
            $imovel->valor = $imovelNegocio->valor;
            $imovel->status = 'Disponível para venda';
            $imovel->descricao = $imovelNegocio->descricao;
            $imovel->save();

            $imovelNegocio->delete();

        }

//        $negocio = Negocios_Clientes::find()
    }


    public function destroy($id)
    {
        //
    }
}
