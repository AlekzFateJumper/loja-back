<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_itens', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cart_id')->nullable();
            $table->unsignedInteger('fornecedor_id')->nullable();
            $table->integer('item_id');
            $table->integer('qtd');
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
        Schema::dropIfExists('cart_itens');
    }
}
