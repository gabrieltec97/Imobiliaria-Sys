<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        $verificacao = 1;
        $valor = 35;

        return view('login.Clientes.gerenciamento-clientes', compact('clientes', 'verificacao', 'valor'));
    }


    public function create()
    {
        return view('login.Clientes.novo-cliente');
    }


    public function store(Request $request)
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
        $cliente->imovel_negociado = $request->imovel_negociado;
        $cliente->negociado_em = $request->negociado_em;
        $cliente->status_pagamento = $request->status_pagamento;
        $cliente->observacoes = $request->observacoes;
        $cliente->save();

        return redirect(route('cliente.index'))->with('msg', 'Novo cliente cadastrado com sucesso!');
    }


    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('login.Clientes.cliente', compact('cliente'));
    }


    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('login.Clientes.edicao', compact('cliente'));
    }


    public function update(Request $request, $id)
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
        $cliente->imovel_negociado = $request->imovel_negociado;
        $cliente->negociado_em = $request->negociado_em;
        $cliente->status_pagamento = $request->status_pagamento;
        $cliente->observacoes = $request->observacoes;
        $cliente->save();

        return redirect(route('cliente.index'))->with('msg-2', 'Dados cadastrais alterados com sucesso!');
    }


    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect(route('cliente.index'))->with('msg-3', 'Cadastro de cliente deletado com sucesso!');
    }

    public function busca(Request $request)
    {

        if($request->nome == ''){
            $clientes = Cliente::all();
        }
        else{
            $clientes = DB::table('clientes')
                ->where('nome', 'like', '%'.$request->nome.'%')->get();
        }

        $verificacao = 2;

        if (count($clientes) == 0){
            $valor = 0;
        }else{
            $valor = 1;
        }

        return view('login.Clientes.gerenciamento-clientes', compact('clientes', 'valor', 'verificacao'));
    }
}
