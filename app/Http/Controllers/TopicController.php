<?php
namespace App\Http\Controllers;

use App\Posts as PostsModel;
use App\PostTopics as PostTopicsModel;
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
		// 带文章数的专题
		$topicInfo = TopicsModel::withCount('postTopics')
			->where('top_id', $topic->top_id)
			->first();
		// 专题的文章列表，按照创建时间倒序排列，前10个
		$postsInfo = $topic->posts()
			->orderBy('created_at', 'desc')
			->take(10)
			->get();
		// 属于我的文章，但是未投稿
		$myPosts = PostsModel::authorBy(\Auth::id())
			->topicNotBy($topic->top_id)
			->get();
		return view('topic.show', compact('topicInfo', 'postsInfo', 'myPosts'));
	}

	/**
	 * 投稿
	 * @Author   sulingling
	 * @DateTime 2020-01-27
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function submit(TopicsModel $topic) {
		// 验证
		$this->validate(request(), [
			'post_ids' => 'required|array',
		]);
		$postIds = request('post_ids');
		foreach ($postIds as $postId) {
			$params = [
				'post_id' => $postId,
				'top_id' => $topic->top_id,
			];
			PostTopicsModel::postSave($params);
		}
		return back();
	}
}
