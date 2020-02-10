<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{

    public function create()
    {
        return view('login.Funcionarios.novo-funcionario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario = new Funcionario();

        $funcionario->nome = $request->nome;
        $funcionario->endereco = $request->endereco;
        $funcionario->cpf = $request->cpf;
        $funcionario->rg = $request->rg;
        $funcionario->telefone = $request->telefone;
        $funcionario->telefone_op = $request->telefone_sec;
        $funcionario->email = $request->email;
        $funcionario->cargo = $request->cargo;
        $funcionario->save();

        return redirect('administracao/create')->with('msg', 'Funcionário cadastrado com sucesso!');
    }


    public function gerenciamento()
    {
        $dados = Funcionario::all();

        return view('login.Funcionarios.gerenc-funcionarios', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionario::find($id);

        return view('login.Funcionarios.edicao-funcionario', compact('funcionario'));
    }

    public function show($id)
    {
        $funcionario = Funcionario::find($id);

        return view('login.Funcionarios.dados-funcionario', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);

        $funcionario->nome = $request->nome;
        $funcionario->endereco = $request->endereco;
        $funcionario->cpf = $request->cpf;
        $funcionario->rg = $request->rg;
        $funcionario->telefone = $request->telefone;
        $funcionario->telefone_op = $request->telefone_sec;
        $funcionario->email = $request->email;
        $funcionario->cargo = $request->cargo;
        $funcionario->save();

        return redirect('gerenciamento')->with('d-msg', 'Cadastro de usuário alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->delete();

        return redirect('gerenciamento')->with('msg', 'Usuário deletado com sucesso!');
    }
}
