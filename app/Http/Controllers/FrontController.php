<?php

namespace App\Http\Controllers;

use App\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function imovel($id)
    {
        $imovel = Imovel::find($id);

        return view('imovel-front', compact('imovel'));
    }

    public function contato()
    {
        return view('contato');
    }
}
