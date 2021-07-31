<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image',100);
            $table->string('product_name',100);
            $table->string('product_code',100);
            $table->string('shop_name',100);
            $table->string('shop_code',100);
            $table->string('product_info',100);
            $table->string('product_quantity',100);
            $table->string('unit_price',100);
            $table->string('total_price',100);
            $table->string('username',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_cart');
    }
}
