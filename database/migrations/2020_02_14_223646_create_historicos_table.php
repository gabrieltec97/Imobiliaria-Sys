<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('cliente_responsavel');
            $table->string('imovel_negociado');
            $table->string('negociado_em');
            $table->string('negociado_por');
            $table->string('status_pagamento');
            $table->string('observacoes')->nullable();
            $table->string('status')->nullable();
            $table->longText('motivo_encerramento')->nullable();
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
        Schema::dropIfExists('historicos');
    }
}
