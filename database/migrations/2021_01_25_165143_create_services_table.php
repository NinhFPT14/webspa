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
            $table->string('name',255);
            $table->string('description',255);
            $table->string('detail',255);
            $table->integer('price',11);
            $table->integer('discount',11);
            $table->string('slug',255);
            $table->string('time_working',255)->comment('thời gian làm');
            $table->string('total_time',255)->comment('tổng số lần làm');
            $table->string('time_distance',255)->comment('khoảng cách làm giữa các buổi theo ngày');
            $table->integer('status',10);
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
