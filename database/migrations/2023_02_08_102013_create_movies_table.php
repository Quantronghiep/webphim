<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->integer('status')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('genre_id');
            $table->unsignedInteger('country_id');
            $table->timestamps();
//             $table->unsignedInteger('category_id');
//             $table->foreign('category_id')
//                     ->references('id')
//                     ->on('categories')
//                     ->onDelete('cascade');
// //                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
