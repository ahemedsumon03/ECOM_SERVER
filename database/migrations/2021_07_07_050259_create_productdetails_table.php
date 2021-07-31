
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductdetailsTable extends Migration
{

    public function up()
    {
        Schema::create('productdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_code',100);
            $table->string('img1',100);
            $table->string('img2',100);
            $table->string('img3',100);
            $table->string('img4',100);
            $table->text('des');
            $table->string('color',100);
            $table->string('size',100);
            $table->string('details',500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productdetails');
    }
}
