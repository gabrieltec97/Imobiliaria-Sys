<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function cadastrar_usuario(Request $request)
    {
        $user = new User();
        $user->name = $request->nome;
        $user->surname = $request->sobrenome;
        $user->email = $request->email;
        $user->password = bcrypt($request->senha);
        $user->occupation = $request->ocupacao;
        $user->save();

        return redirect('/novo-usuario')->with('msg', 'Cadastro realizado com sucesso!');
    }

    //Gerenciamento de Usuários.
    public function usuarios_lista()
    {
        $dados = User::all();

        return view('login.Usuarios.usuarios', compact('dados'));
    }


    public function salvar()
    {
        $user = new User();

        $user->name = 'Gabriel';
        $user->surname = 'Pereira';
        $user->email = 'g@t.com';
        $user->password = bcrypt('123');
        $user->occupation = 'administrador';
        $user->save();
    }


    public function edit($id)
    {
        $dados = User::find($id);

        return view('login.Usuarios.edicao-usuario', compact('dados'));
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
        $dados = User::find($id);

        $dados->name = $request->nome;
        $dados->surname = $request->sobrenome;
        $dados->email = $request->email;
        $dados->password = bcrypt($request->senha);
        $dados->occupation = $request->ocupacao;
        $dados->save();

        return redirect('/usuarios')->with('msg-2', 'Dados do usuário alterados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('usuarios')->with('msg', 'Cadastro de usuário deletado com sucesso!');
    }
}
