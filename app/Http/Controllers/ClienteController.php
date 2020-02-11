<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();

        return view('login.Clientes.gerenciamento-clientes', compact('clientes'));
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
        echo $id;
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
