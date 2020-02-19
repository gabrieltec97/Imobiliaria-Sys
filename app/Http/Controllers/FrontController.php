<?php

namespace App\Http\Controllers;

use App\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function inicio()
    {
        $imoveisVenda = DB::table('imovels')
            ->where('tipo_negocio', '=', 'Venda')->get()->take(3)->toArray();

        $imoveisAluguel = DB::table('imovels')
            ->where('tipo_negocio', '=', 'Aluguel')->get()->take(3)->toArray();

        $imagens = DB::table('imovel_fotos')->select('id_anuncio')->distinct()->get()->toArray();

        $fotos = array();

        foreach ($imagens as $key => $value){
            $foto = DB::table('imovel_fotos')->select('foto_anuncio', 'id_anuncio')
                ->where('id_anuncio', '=', $value->id_anuncio)->get()->take(1)->toArray();

            foreach ($foto as $key => $value){
                array_push($fotos, ['id' => $value->id_anuncio, 'foto' => $value->foto_anuncio]);
            }

        }

        return view('inicio', compact('imoveisAluguel', 'imoveisVenda', 'imagens', 'fotos'));
    }


    public function buscarImoveis()
    {
        return view('buscar-imoveis');
    }

    public function buscaRapida(Request $request)
    {
        $imoveis = DB::table('imovels')
            ->where('tipo_negocio', '=', $request->tipo_negocio)
            ->where('tipo_imovel', '=' , $request->tipo_imovel)
            ->where('estado', '=' , $request->estado)->get()->toArray();

        $imagens = DB::table('imovel_fotos')->select('id_anuncio')->distinct()->get()->toArray();

        $fotos = array();

        foreach ($imagens as $key => $value){
            $foto = DB::table('imovel_fotos')->select('foto_anuncio', 'id_anuncio')
                ->where('id_anuncio', '=', $value->id_anuncio)->get()->take(1)->toArray();

            foreach ($foto as $key => $value){
                array_push($fotos, ['id' => $value->id_anuncio, 'foto' => $value->foto_anuncio]);
            }

        }

        return view('buscar-imoveis', compact('imoveis', 'fotos'));
    }


    public function mostrar($id)
    {
        $imovel = Imovel::find($id);
        $imagens = DB::table('imovel_fotos')->select('foto_anuncio')
            ->where('id_anuncio', '=', $id)->get()->toArray();

        return view('imovel-front', compact('imovel', 'imagens'));
    }

    public function enviarEmail(Request $request)
    {
        $dados = array('imovel' => $request->imovel,
        'nome' => $request->nome, 'email' => $request->email, 'telefone' => $request->tel,
            'aceito' => $request->contatowpp);

        Mail::send('Email.email', compact('dados'), function ($m){
            $m->from('gabtec9@gmail.com', 'Contato');
            $m->subject('Contato de possível novo cliente');
            $m->to('gabrieldeveloper23@hotmail.com');
        });

        return back()->with('msg', 'E-mail enviado com sucesso! Em breve estaremos entrando em contato com você. Até mais!');
    }

    public function contatoEmail(Request $request)
    {
        $dados = array('nome' => $request->nome, 'email' => $request->email,
            'telefone' => $request->telefone, 'mensagem' => $request->mensagem);

        Mail::send('Email.email', compact('dados'), function ($m){
            $m->from('gabtec9@gmail.com', 'Contato');
            $m->subject('Contato via site');
            $m->to('gabrieldeveloper23@hotmail.com');
        });

        return back()->with('msg', 'E-mail enviado com sucesso! Em breve estaremos entrando em contato com você. Até mais!');
    }


    public function contato()
    {
        return view('contato');
    }
}
