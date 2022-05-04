<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('size_id')->constrained()->ondelete('cascade')->onupdate('cascade');
            $table->foreignId('country_id')->constrained()->ondelete('cascade')->onupdate('cascade');
            $table->string('size_option_name');
            $table->integer('status');
            $table->softDeletes();
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
        Schema::dropIfExists('size_options');
    }
}
