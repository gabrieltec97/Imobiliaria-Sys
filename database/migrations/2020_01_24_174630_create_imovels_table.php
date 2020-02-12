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
            $table->string('nome')->nullable();
            $table->string('endereco')->nullable();
            $table->string('cep')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('tipo_imovel')->nullable();
            $table->string('qt_quartos')->nullable();
            $table->string('qt_suites')->nullable();
            $table->string('vagas_garagem')->nullable();
            $table->string('tx_condominio')->nullable();
            $table->double('valor')->nullable();
            $table->string('status')->nullable();
            $table->string('tipo_negocio')->nullable();
            $table->longText('descricao')->nullable();
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
