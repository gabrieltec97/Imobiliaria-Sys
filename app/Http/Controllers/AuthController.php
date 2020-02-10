<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('login.dashboard');
    }
}
