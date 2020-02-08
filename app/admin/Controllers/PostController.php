<?php
namespace App\admin\Controllers;

use App\Posts as PostModel;

class PostController extends Controller {

	/**
	 * 文章列表
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index() {
		$posts = PostModel::withoutGlobalScope('avaiable')
			->where('status', 0)
			->orderBy('created_at', 'desc')
			->paginate(6);
		return view('admin.post.index', compact('posts'));
	}

	/**
	 * 文章审核模块
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function status(PostModel $post) {
		// 验证逻辑
		$this->validate(request(), [
			'status' => 'required|in:1,-1',
		]);
		$post->status = request('status');
		$post->save();
		return [
			'error' => 0,
			'msg' => '',
		];
	}
}