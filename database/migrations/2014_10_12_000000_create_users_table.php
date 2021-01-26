<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone_number',11);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('name',255);
            $table->integer('age',10);
            $table->string('avatar',255);
            $table->integer('status')->comment('trạng thái 0: hoạt động 1: ngưng hoạt động');
            $table->integer('role')->comment('quyền tài khoản 0:client 1:admin');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
