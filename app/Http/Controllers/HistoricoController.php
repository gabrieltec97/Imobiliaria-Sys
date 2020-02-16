<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Historico;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{

    public function index()
    {
        $negocios = Historico::all();
        $cliente = Cliente::all();
        $verificacao = 1;
        $valor = 35;

        return view('login.Historicos.historico', compact('negocios', 'valor', 'verificacao','cliente'));
    }



    public function show($id)
    {
        $negocio = Historico::find($id);

        return view('login.Historicos.negocio-historico', compact('negocio'));
    }


    public function edit($id)
    {
        //
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
