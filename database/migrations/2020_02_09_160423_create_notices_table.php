<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 通知表
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('not_id')->comment('消息id');
            $table->string('title', 30)->default('')->comment('消息通知标题');
            $table->string('content', 1000)->default('')->comment('消息通知内容');
            $table->timestamps();
        });

        // 用户通知关系表
        Schema::create('user_notice', function (Blueprint $table) {
            $table->increments('user_not_id')->comment('用户消息关系id');
            $table->integer('user_id')->default(0)->comment('用户id');
            $table->integer('not_id')->default(0)->comment('消息id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
        Schema::dropIfExists('user_notice');
    }
}
