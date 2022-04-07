<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listings_id');
            $table->unsignedBigInteger('categories_id');
            $table->timestamps();

            $table->foreign('listings_id')->references('id')->on('listings')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings_categories');
    }
}
