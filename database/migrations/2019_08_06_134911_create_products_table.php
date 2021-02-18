<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('sub_category_id')->nullable();
            $table->integer('thirdCategory_id')->nullable();
            $table->string('product_name');
            $table->longText('details');
            $table->string('price')->nullable();
            $table->string('offer_price')->nullable();
            $table->string('slug');
            $table->string('image')->default('default.png');
            $table->integer('quantity')->default(1);
            $table->string('sellerName')->nullable();
            $table->integer('sellerId')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->tinyInteger('hot_deal')->nullable()->default(0);
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
        Schema::dropIfExists('products');
    }
}
