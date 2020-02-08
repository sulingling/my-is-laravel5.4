<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('admin_users', function (Blueprint $table) {
			$table->increments('admin_user_id')->comment('后台用户id');
			$table->string('name', 30)->comment('后台用户名称');
			$table->string('password', 100)->comment('用户密码');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('admin_users');

	}
}
