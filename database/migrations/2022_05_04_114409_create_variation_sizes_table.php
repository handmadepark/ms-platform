<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variation_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('variation_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->timestamps();
            $table->foreign('variation_id')->references('id')->on('variations')
                ->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')
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
        Schema::dropIfExists('variation_sizes');
    }
}
