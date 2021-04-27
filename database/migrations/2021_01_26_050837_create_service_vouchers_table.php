<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment('mã giảm giá');
            $table->integer('discount')->comment('số phần trăm giảm ');
            $table->dateTime('time_start')->comment('thời gian bắt đầu');
            $table->dateTime('time_end')->comment('thời gian kết thúc');
            $table->integer('status')->comment('trạng thái bật tắt voucher 0: hoạt động , 1: tắt');
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
        Schema::dropIfExists('service_vouchers');
    }
}
