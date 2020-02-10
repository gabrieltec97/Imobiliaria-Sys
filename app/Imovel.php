<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    public function fotos()
    {
        return $this->hasMany(ImovelFotos::class, 'id_anuncio', 'id');
    }
}
