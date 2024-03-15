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
            $table->string('username', 50);
            $table->string('password', 125);
            $table->integer('user_type')->default(0);
            $table->integer('user_status');
            $table->string('name', 100);
            $table->integer('province_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('address', 100);
            $table->string('time_open', 20);
            $table->string('email', 25);
            $table->string('phone', 15);
            $table->string('avatar', 125);
            $table->float('rate_point');
            $table->integer('rate_comment')->default(0);
            $table->dateTime('last_login')->nullable();
            $table->string('bank_name', 50)->nullable();
            $table->string('bank_number', 25)->nullable();
            $table->string('bank_account', 25)->nullable();
            $table->integer('money')->default(0);
            $table->timestamps();
            $table->tinyInteger('provider_type')->default(0);
            $table->string('token_active')->nullable();
            $table->string('token_reset_password')->nullable();
            $table->primary('id');
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
