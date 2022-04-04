<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->string('name')->unique();
            $table->string('login')->unique();
            $table->string('password');
            $table->string('phone')->unique()->nullable();
            $table->string('related_person')->nullable();
            $table->json('email')->nullable();
            $table->json('social')->nullable();
            $table->string('address')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('status')->default(1);
            $table->integer('who_manage');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
