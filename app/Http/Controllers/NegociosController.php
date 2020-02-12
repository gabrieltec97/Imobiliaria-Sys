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

            //Atualizando o id_anuncio para o id do imóvel.
            DB::table('imovel_fotos')->where('id_anuncio', '=', $imovelNegocio->imovel_negociado)
                ->update(['id_anuncio' => $imovel->id]);

            //Encontrando o contrato para deletá-lo do servidor.
            $arquivo = DB::table('contratos')->where('id_negocio', '=', $id)->get()->toArray();

            foreach ($arquivo as $key => $value){
                File::delete($value->foto_contrato);
            }

            //Deletando o contrato do banco
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

            //Atualizando o id_anuncio para o id do imóvel.
            DB::table('imovel_fotos')->where('id_anuncio', '=', $imovelNegocio->imovel_negociado)
                ->update(['id_anuncio' => $imovel->id]);

            //Encontrando o contrato para deletá-lo do servidor.
            $arquivo = DB::table('contratos')->where('id_negocio', '=', $id)->get()->toArray();

            foreach ($arquivo as $key => $value){
                File::delete($value->foto_contrato);
            }

            //Deletando o contrato do banco.
            DB::table('contratos')->where('id_negocio', '=', $id)->delete();

            return redirect(route('negocios_fechados.index'))->with('msg-3', 'Negócio desfeito com sucesso!');
        }
    }

    public function negociarCadastrar(Request $request, $id)
    {
        $cliente = new Cliente();

        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->cpf = $request->cpf;
        $cliente->save();

        $imovel = Imovel::find($id);

        /*Movendo o imóvel para negócios fechados e informando o imóvel
        que está sendo negociado, status e observações.*/
        if ($imovel->status == 'Disponível para aluguel'){

            $imovel = Imovel::find($id);
            $novoRegistro = new NegociosFechados();

            $novoRegistro->cliente_responsavel = $cliente->id;
            $novoRegistro->imovel_negociado = $id;
            $novoRegistro->negociado_em = $request->negociado_em;
            $novoRegistro->status_pagamento = $request->status_pagamento;
            $novoRegistro->observacoes = '';
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

            //Atualizando o id_anuncio para o id do novo negócio
            DB::table('imovel_fotos')->where('id_anuncio', '=', $imovel->id)
                ->update(['id_anuncio' => $novoRegistro->id]);

        }
        elseif($imovel->status == 'Disponível para venda'){

            $imovel = Imovel::find($id);
            $novoRegistro = new NegociosFechados();

            $novoRegistro->cliente_responsavel = $request->cliente;
            $novoRegistro->imovel_negociado = $imovel->id;
            $novoRegistro->negociado_em = $request->negociado_em;
            $novoRegistro->status_pagamento = 'Em dia';
            $novoRegistro->observacoes = '';
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

            //Atualizando o id_anuncio para o id do novo negócio
            DB::table('imovel_fotos')->where('id_anuncio', '=', $imovel->id)
                ->update(['id_anuncio' => $novoRegistro->id]);
        }

        return redirect(route('anexar-contrato', $novoRegistro->id))->with('msg', 'Cliente cadastrado com sucesso!');
    }


    public function destroy($id)
    {
        //
    }
}
