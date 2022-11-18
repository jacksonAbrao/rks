<?php

use App\Models\Enuns\Evento\StatusEvento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventoCamposNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evento', function (Blueprint $table) {
            $table->dateTime('data_evento')->nullable()->change();
            $table->dateTime('inicio_vendas')->nullable()->change();
            $table->dateTime('fim_vendas')->nullable()->change();
            $table->json('tipos_pagamento')->nullable()->change();
            $table->text('descricao')->nullable()->change();
            $table->string('status')->default(StatusEvento::Rascunho)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evento', function (Blueprint $table) {
            $table->dateTime('data_evento')->nullable(false)->change();
            $table->dateTime('inicio_vendas')->nullable(false)->change();
            $table->dateTime('fim_vendas')->nullable(false)->change();
            $table->json('tipos_pagamento')->nullable(false)->change();
            $table->text('descricao')->nullable(false)->change();
        });
    }
}
