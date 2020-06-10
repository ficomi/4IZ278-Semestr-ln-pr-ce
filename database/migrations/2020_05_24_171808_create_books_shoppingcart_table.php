<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_shoppingcart', function (Blueprint $table) {
            $table->integer('books_id')->unsigned();
            $table->integer('shoppingcart_id')->unsigned();
            $table->integer('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books_shoppingcart', function (Blueprint $table) {
    
        });
    }
}
