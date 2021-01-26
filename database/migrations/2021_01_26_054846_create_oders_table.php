<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oders', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->integer('phone_number',11);
            $table->string('address',255);
            $table->text('note');
            $table->unsignedBigInteger('voucher_id',10)->nullable();
            $table->foreign('voucher_id')->references('id')->on('product_vouchers');
            $table->unsignedBigInteger('user_id',10)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('oders');
    }
}
