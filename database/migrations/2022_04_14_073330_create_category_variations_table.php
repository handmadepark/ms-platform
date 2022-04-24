<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_variations', function (Blueprint $table) {
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->unsignedBigInteger('variations_id')->nullable();
            $table->timestamps();
            $table->foreign('categories_id')->references('id')->on('categories')
                ->onDelete('cascade');
            $table->foreign('variations_id')->references('id')->on('variations')
        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_variations');
    }
}
