<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
=======
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
>>>>>>> e11b8bf14473c4dc43accf0fe30e28b7348592de

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
<<<<<<< HEAD
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
=======
            $table->increments('user_id')->comment('用户id');
            $table->string('name')->comment('用户名称');
            $table->string('email')->unique()->comment('用户邮件');
            $table->string('password')->comment('用户密码');
>>>>>>> e11b8bf14473c4dc43accf0fe30e28b7348592de
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
