<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->string('author');
            $table->string('image')->nullable();
            $table->string('genre');
            $table->string('language');
            $table->integer('published_in');
            $table->double('price', 15, 2);
        });

        // Add the constraint
         DB::raw('ALTER TABLE books ADD CONSTRAINT price CHECK (price < 0);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
