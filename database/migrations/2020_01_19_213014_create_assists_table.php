<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('assists', function (Blueprint $table) {
			$table->increments('assist_id')->comment('点赞id');
			$table->integer('user_id')->default(0)->comment('创建人id');
			$table->integer('post_id')->default(0)->comment('文章id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('assists');
	}
}
