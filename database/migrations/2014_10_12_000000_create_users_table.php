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
            $table->string('email')->unique();
            $table->integer('phone_number')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('name');
            $table->integer('age');
            $table->string('avatar')->nullable();
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
