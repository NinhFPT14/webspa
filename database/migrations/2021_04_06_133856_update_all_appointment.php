<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAllAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('phone')->change();
            $table->string('token');
            $table->integer('otp')->nullable();
            $table->integer('payment_methods')->nullable();
            $table->dropForeign('appointments_user_id_foreign');
            $table->dropColumn('user_id');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->integer('phone')->change();
        });
    }
}
