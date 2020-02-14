<?php

namespace App\Http\Controllers;

use App\Cliente;
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
        $cliente = Cliente::find($imovel->cliente_responsavel);
        $contrato = DB::table('contratos')->select('foto_contrato')
            ->where('id_negocio', '=', $id)->get()->toArray();

        $imagens = DB::table('imovel_fotos')->selectRaw('foto_anuncio')
            ->whereRaw('id_anuncio = '. $imovel->imovel_negociado)->get();

        return view('login.Negocios.imovel-alugado', compact('imovel', 'imagens', 'cliente', 'contrato'));
    }

    public function edit($id)
    {
        $negocio = NegociosFechados::find($id);

        return view('login.Negocios.editar-negocio', compact('negocio'));
    }

    public function update(Request $request, $id)
    {
        $negocio = NegociosFechados::find($id);

        $negocio->nome = $request->nome;
        $negocio->endereco = $request->endereco;
        $negocio->cep = $request->cep;
        $negocio->cidade = $request->cidade;
        $negocio->estado = $request->estado;
        $negocio->tipo_imovel = $request->tipo_imovel;
        $negocio->qt_quartos = $request->qt_quartos;
        $negocio->qt_suites = $request->qt_suites;
        $negocio->valor = $request->valor;
        $negocio->status_pagamento = $request->status_pagamento;
        $negocio->observacoes = $request->observacoes;
        $negocio->descricao = $request->descricao;
        $negocio->save();

        return redirect(route('negocios_fechados.index'))->with('msg-4', 'Registro editado com sucesso!');
    }



    public function retornar(Request $request, $id)
    {

        $imovelNegocio = NegociosFechados::find($id);

        if ($imovelNegocio->status == 'Alugado'){

            $imovel = new Imovel();

            $imovel->id = $imovelNegocio->imovel_negociado;
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

            //Encontrando o contrato para deletá-lo do servidor.
            $arquivo = DB::table('contratos')->where('id_negocio', '=', $id)->get()->toArray();

            foreach ($arquivo as $key => $value){
                File::delete($value->foto_contrato);
            }

            //Deletando o contrato do banco
            DB::table('contratos')->where('id_negocio', '=', $id)->delete();

            return redirect(route('imovel.index'))->with('msg-4', 'Negócio desfeito com sucesso!');

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

            //Encontrando o contrato para deletá-lo do servidor.
            $arquivo = DB::table('contratos')->where('id_negocio', '=', $id)->get()->toArray();

            foreach ($arquivo as $key => $value){
                File::delete($value->foto_contrato);
            }

            //Deletando o contrato do banco.
            DB::table('contratos')->where('id_negocio', '=', $id)->delete();

            return redirect(route('imovel.index'))->with('msg-4', 'Negócio desfeito com sucesso!');
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
        }

        return redirect(route('anexar-contrato', $novoRegistro->id))->with('msg', 'Cliente cadastrado com sucesso!');
    }


    public function download($id)
    {
        $contrato = DB::table('contratos')->select('foto_contrato')
            ->where('id_negocio', '=', $id)->get()->toArray();

        foreach ($contrato as $key => $value){
            return response()->download($value->foto_contrato);
        }

        return redirect(route('negocios_fechados.show'));
    }


}
