<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionAndRoles extends Migration {
	/**
	 * 角色表
	 * @Author   sulingling
	 * @DateTime 2020-01-30
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function up() {
		// 角色表
		Schema::create('admin_roles', function (Blueprint $table) {
			$table->increments('role_id')->comment('后台角色id');
			$table->string('name', 30)->default('')->comment('后台角色名称');
			$table->string('desc', 100)->default('')->comment('后台角色描述');
			$table->timestamps();
		});

		// 权限表
		Schema::create('admin_permissions', function (Blueprint $table) {
			$table->increments('per_id')->comment('后台权限id');
			$table->string('name', 30)->default('')->comment('后台权限名称');
			$table->string('desc', 100)->default('')->comment('后台权限描述');
			$table->timestamps();
		});

		// 权限角色表
		Schema::create('admin_permission_role', function (Blueprint $table) {
			$table->increments('per_role_id')->comment('后台权限角色id');
			$table->integer('role_id')->default(0)->comment('后台角色id');
			$table->integer('per_id')->default(0)->comment('后台权限id');
			$table->timestamps();
		});

		// 用户角色表
		Schema::create('admin_role_user', function (Blueprint $table) {
			$table->increments('role_user_id')->comment('后台用户角色id');
			$table->integer('role_id')->default(0)->comment('后台角色id');
			$table->integer('user_id')->default(0)->comment('后台用户id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('admin_roles');
		Schema::dropIfExists('admin_permissions');
		Schema::dropIfExists('admin_permission_role');
		Schema::dropIfExists('admin_role_user');
	}
}
