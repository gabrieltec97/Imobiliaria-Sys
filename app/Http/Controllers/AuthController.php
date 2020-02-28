<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    //Área de Login

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credenciais)){
            return redirect()->intended(route('dashboard'));
        }else {
            $mensagem = 1;
            return view('login-adm', compact('mensagem'));
        }
    }

    public function dashboard()
    {
        $imoveis = DB::table('imovels')->count();
        $negocios = DB::table('negocios_fechados')->count();
        $clientes = DB::table('clientes')->count();
        $historico = DB::table('historicos')->count();
        return view('login.dashboard', compact('imoveis', 'negocios', 'clientes', 'historico'));
    }
}
