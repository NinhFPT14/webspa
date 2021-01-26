<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_oders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id',10);
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('oder_id',10);
            $table->foreign('oder_id')->references('id')->on('oders');
            $table->integer('quality',10)->comment('số lượng sản phẩm');
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
        Schema::dropIfExists('product_oders');
    }
}
