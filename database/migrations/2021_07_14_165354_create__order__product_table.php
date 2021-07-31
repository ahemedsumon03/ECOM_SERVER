<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_order__product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no',100);
            $table->string('product_name',100);
            $table->string('product_code',100);
            $table->string('shop_name',100);
            $table->string('shop_code',100);
            $table->string('product_info',100);
            $table->string('product_quantity',100);
            $table->string('unit_price',100);
            $table->string('total_price',100);
            $table->string('mobile_no',100);
            $table->string('username',100);
            $table->string('name',100);
            $table->string('payment_method',100);
            $table->string('delivery_address',100);
            $table->string('delivery_charge',100);
            $table->string('city',100);
            $table->string('order_date',100);
            $table->string('order_time',100);
            $table->string('order_status',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_order__product');
    }
}
