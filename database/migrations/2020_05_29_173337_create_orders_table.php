<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();;
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('postal_code');
            $table->string('phone_number');
            $table->enum('payment_type', ['Karta', 'Dobírka']);
            $table->double('price', 15, 2)->nullable();
        $table->enum('status', ['Objednáno', 'Na cestě', 'Doručeno'])->default('Objednáno');
        });

        // Add the constraint
        DB::raw('ALTER TABLE orders ADD CONSTRAINT price CHECK (price < 0);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
