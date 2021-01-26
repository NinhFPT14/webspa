<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->integer('phone',11);
            $table->text('note');
            $table->unsignedBigInteger('user_id',10)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('voucher_id',10)->nullable();
            $table->foreign('voucher_id')->references('id')->on('service_vouchers');
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
        Schema::dropIfExists('appointments');
    }
}
