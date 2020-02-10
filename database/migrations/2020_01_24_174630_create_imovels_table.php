<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('endereco');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('tipo_imovel');
            $table->string('qt_quartos');
            $table->string('qt_suites');
            $table->string('vagas_garagem');
            $table->string('tx_condominio');
            $table->string('tipo_negocio');
            $table->longText('descricao');
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
        Schema::dropIfExists('imovels');
    }
}
