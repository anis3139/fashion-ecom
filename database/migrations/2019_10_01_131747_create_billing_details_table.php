<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sale_id');
            $table->integer('product_id');
            $table->string('product_unite_price');
            $table->string('product_quantity');
            $table->string('invoice');
            $table->string('date');
            $table->string('month');
            $table->string('sellerName')->nullable();
            $table->integer('status')->default(0);
            $table->integer('sellerId')->nullable();
            $table->string('promote')->nullable();
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
        Schema::dropIfExists('billing_details');
    }
}
