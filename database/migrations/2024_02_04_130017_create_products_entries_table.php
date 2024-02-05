<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_entries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // OU
            //$table->string('id', 45)->primary();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->unsignedDecimal('unity_price',  $precision = 8, $scale = 2);            
            $table->char('action_code', 1);
            $table->foreign('action_code')->references('id')->on('type_actions');
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
        Schema::dropIfExists('products_entries');
    }
}
