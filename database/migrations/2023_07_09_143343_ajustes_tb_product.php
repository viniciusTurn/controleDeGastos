<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjustesTbProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {            
            $table->renameColumn('NOME', 'description');
            $table->renameColumn('QUANTIDADE_EM_ESTOQUE', 'amount');
            $table->renameColumn('PRECO_UNITARIO', 'unity_price');
            $table->char('action_code', 1);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('description', 'NOME');
            $table->renameColumn('amount', 'QUANTIDADE_EM_ESTOQUE');
            $table->renameColumn('unity_price', 'PRECO_UNITARIO');
            $table->dropColumn('action_code');
        });
    }
}
