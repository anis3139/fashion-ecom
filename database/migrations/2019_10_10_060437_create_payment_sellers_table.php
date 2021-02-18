<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('month');
            $table->string('year');
            $table->integer('amount');
            $table->string('payment_type');
            $table->string('userName');
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
        Schema::dropIfExists('payment_sellers');
    }
}
