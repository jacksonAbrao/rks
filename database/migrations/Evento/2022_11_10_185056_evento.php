<?php

use App\Models\Enuns\Evento\StatusEvento;
use App\Models\Enuns\Evento\TipoIngresso;
use App\Models\Enuns\Sexo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Evento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('estabelecimento', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('nome', 255);
            $table->integer('capacidade');
            $table->string('path_mapa', 300)->nullable();
            $table->uuid('endereco_id')->nullable();
            $table->foreign('endereco_id')->references('id')->on('endereco');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('evento', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome', 300);
            $table->dateTime('data_evento');
            $table->dateTime('inicio_vendas');
            $table->dateTime('fim_vendas');
            $table->json('tipos_pagamento');
            $table->integer('quantidade_parcelas')->default(1);
            $table->double('taxa_conveniencia')->default(0);
            $table->integer('quantidade_por_usuario')->default(1);
            $table->string('status')->default(StatusEvento::Novo);
            $table->string('path_imagem', 300)->nullable();
            $table->uuid('estabelecimento_id')->nullable();
            $table->uuid('endereco_id')->nullable();
            $table->uuid('usuario_id')->nullable();
            $table->json('palavras_chave')->nullable();
            $table->text('descricao');

            $table->foreign('endereco_id')->references('id')->on('endereco');
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimento');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('evento_ingresso', function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('nome', 255);
            $table->integer('quantidade');
            $table->integer('comprimento_codigo_barras')->default(10);
            $table->double('valor');
            $table->string('sexo', 20)->default(Sexo::Unissex);
            $table->string('tipo_ingresso', 20)->default(TipoIngresso::Normal);
            $table->dateTime('inicio_vendas');
            $table->dateTime('fim_vendas');
            $table->integer('permitir_compra');
            $table->integer('taxa_conveniencia_ativa');
            $table->integer('exige_cpf');
            $table->integer('quantidade_por_usuario')->default(1);
            $table->integer('quantidade_por_usuario_pdv')->default(1);
            $table->integer('quantidade_entradas_permitidas')->default(1);
            $table->integer('necessario_aprovacao_imagem')->default(0);
            $table->integer('order')->default(0);
            $table->uuid('evento_id');
            $table->foreign('evento_id')->references('id')->on('evento');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE evento ADD CONSTRAINT evento_validador_parcelas CHECK(quantidade_parcelas > 0 and quantidade_parcelas <= 12)");
        DB::statement("ALTER TABLE evento ADD CONSTRAINT evento_validador_conveniencia CHECK(taxa_conveniencia >= 0 and taxa_conveniencia <= 100)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
    */
    public function down(){
        Schema::dropIfExists('evento');
        Schema::dropIfExists('estabelecimento');
    }
}
