<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserreviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_userreview', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_code',100);
            $table->string('product_name',100);
            $table->string('user_name',100);
            $table->string('user_photo')->nullable();
            $table->string('reviewer_name',100);
            $table->string('reviewer_rating',100);
            $table->string('reviewer_comments',300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_userreview');
    }
}
