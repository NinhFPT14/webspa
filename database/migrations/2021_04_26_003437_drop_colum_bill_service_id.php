<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumBillServiceId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sort_appointments', function (Blueprint $table) {
            $table->dropForeign('sort_appointments_bill_service_id_foreign');
            $table->dropColumn('bill_service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sort_appointments', function (Blueprint $table) {
            //
        });
    }
}
