<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name_on_card');
            $table->string('card_number');
            $table->string('expiration_month');
            $table->string('expiration_year');
            $table->string('cvc');
            $table->integer('main');
            $table->integer('status')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('store_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_cards');
    }
}
