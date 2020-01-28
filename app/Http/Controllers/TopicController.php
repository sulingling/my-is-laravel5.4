<?php
namespace App\Http\Controllers;

use App\Topics as TopicsModel;

class TopicController extends Controller {

	/**
	 * 专题详情页面
	 * @Author   sulingling
	 * @DateTime 2020-01-27
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function show(TopicsModel $topic) {
		return view('topic.show');
	}

	/**
	 * 投稿
	 * @Author   sulingling
	 * @DateTime 2020-01-27
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function submit() {
		return '投稿';
	}
}
