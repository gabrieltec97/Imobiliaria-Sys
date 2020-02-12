<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Contratos;
use App\Imovel;
use App\Negocios_Clientes;
use App\NegociosFechados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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



    public function show($id)
    {
        //Capturando dados para serem mostrados na view.
        $imovel = NegociosFechados::find($id);
        $busca = DB::table('clientes')->select('nome')
            ->where('id', '=', $imovel->cliente_responsavel)->get()->toArray();

        $cliente = array($busca[0]->nome, $imovel->cliente_responsavel);

        $imagens = DB::table('imovel_fotos')->selectRaw('foto_anuncio')
            ->whereRaw('id_anuncio = '. $imovel->imovel_negociado)->get();

        return view('login.Negocios.imovel-alugado', compact('imovel', 'imagens', 'cliente'));
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

            $arquivo = DB::table('contratos')->where('id_negocio', '=', $id)->get()->toArray();

            foreach ($arquivo as $key => $value){
                File::delete($value->foto_contrato);
            }

            DB::table('contratos')->where('id_negocio', '=', $id)->delete();

            return redirect(route('negocios_fechados.index'))->with('msg-3', 'Negócio desfeito com sucesso!');

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

            $arquivo = DB::table('contratos')->where('id_negocio', '=', $id)->get()->toArray();

            foreach ($arquivo as $key => $value){
                File::delete($value->foto_contrato);
            }

            DB::table('contratos')->where('id_negocio', '=', $id)->delete();

            return redirect(route('negocios_fechados.index'))->with('msg-3', 'Negócio desfeito com sucesso!');
        }
    }


    public function destroy($id)
    {
        //
    }
}
