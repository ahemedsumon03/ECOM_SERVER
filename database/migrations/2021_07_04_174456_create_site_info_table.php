<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('about',500);
            $table->string('terms',500);
            $table->string('policy',500);
            $table->string('purchase_guide',500);
            $table->string('about_company',500);
            $table->string('address',500);
            $table->string('android_app_link',300);
            $table->string('ios_app_link',300);
            $table->string('facebook_link',300);
            $table->string('twitter_link',300);
            $table->string('instragram_link',300);
            $table->string('delivery_notice',500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_info');
    }
}
