<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTopicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('post_topics', function (Blueprint $table) {
			$table->increments('post_top_id')->comment('文章专题id');
			$table->integer('post_id')->default(0)->comment('文章id');
			$table->integer('top_id')->default(0)->comment('专题id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('post_topics');
	}
}
