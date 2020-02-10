<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel_fotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_anuncio');
            $table->string('foto_anuncio');
            $table->string('nome_original');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovel_fotos');
    }
}
