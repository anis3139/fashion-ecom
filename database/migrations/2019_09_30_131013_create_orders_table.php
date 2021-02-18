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
            $table->integer('product_id')->nullable();
            $table->integer('shipping_id');
            $table->integer('user_id')->nullable();
            $table->string('invoice');
            $table->string('grandTotal');
            $table->string('shiping')->nullable();
            $table->string('payment');
            $table->string('month');
            $table->string('year');
            $table->string('date');
            $table->string('trackingProduct')->nullable();
            $table->string('trxID')->nullable();
            $table->string('number')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
