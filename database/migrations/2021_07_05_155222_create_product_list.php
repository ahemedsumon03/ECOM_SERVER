<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',200);
            $table->string('price',200);
            $table->string('special_price',200);
            $table->string('image',200);
            $table->string('category',200);
            $table->string('subcategory',200);
            $table->string('remark',200);
            $table->string('brand',200);
            $table->string('shop',200);
            $table->string('shop_name',200);
            $table->string('star',200);
            $table->string('product_code',200);
            $table->string('stock',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_list');
    }
}
