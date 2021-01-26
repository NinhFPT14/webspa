<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('detail');
            $table->integer('price');
            $table->integer('discount');
            $table->string('slug');
            $table->string('time_working')->comment('thời gian làm');
            $table->string('total_time')->comment('tổng số lần làm');
            $table->string('time_distance')->comment('khoảng cách làm giữa các buổi theo ngày');
            $table->integer('status');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('services');
    }
}
