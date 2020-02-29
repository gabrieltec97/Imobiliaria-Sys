<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Historico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoricoController extends Controller
{

    public function index()
    {
        $negocios = DB::table('historicos')->orderByDesc('updated_at')->paginate(7);
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

    public function buscar(Request $request)
    {
        $busca =  $request->imovel;
        $negocios = DB::table('historicos')
            ->where('nome_imovel', 'like', '%'. $busca . '%')->paginate(7);

        if(count($negocios) == 0){
            $valor = 0;
        }else{
            $valor = 1;
        }

        $verificacao = 2;

        return view('login.Historicos.historico', compact('negocios', 'valor', 'verificacao', 'busca'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
       $historico = DB::table('historicos')->where('id_negocio_fechado', '=', $id)->update(['status_pagamento' => 'Mensalidades pagas',
           'observacoes' => null]);

       return redirect(route('historico.show', $id))->with('msg', 'Débitos zerados com sucesso!');
    }


    public function destroy($id)
    {
        //
    }
}
