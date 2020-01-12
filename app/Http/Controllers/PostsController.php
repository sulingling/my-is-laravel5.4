<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Posts as PostsModel;
use Illuminate\Http\Request;

class PostsController extends Controller {

	/**
	 *  文章列表页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index() {
		$posts = PostsModel::orderBy('created_at', 'desc')
			->paginate(6);
		return view('posts.index', compact('posts'));
	}

	/**
	 *  创建文章表单页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function create() {
		return view('posts.create');
	}

	/**
	 *  创建文章表单提交页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'title' => 'required|string|max:100|min:5', //非空|字符串|最大长度|最小长度
			'content' => 'required|string|max:500|min:10',
		]);
		$params = request()->all();
		if (PostsModel::postsSave($params)) {
			return redirect('/posts');
		}
		return view('posts.create');
	}

	/**
	 *  文章详情页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function show(PostsModel $posts) {
		return view('posts.show', compact('posts'));
	}

	/**
	 *  编辑文章表单页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function edit(PostsModel $posts) {
		return view('posts.edit', compact('posts'));
	}

	/**
	 *  编辑文章提交表单页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	// public function update(PostsModel $posts) {
	public function update() {
		// 用户权限认证
		$this->validate(request(), [
			'title' => 'required|string|max:100|min:5', //非空|字符串|最大长度|最小长度
			'content' => 'required|string|max:500|min:10',
		]);
		$params = request()->all();

		$postId = PostsModel::editPosts($params);
		if ($postId) {
			return redirect('/posts/' . $postId);
		}
		return redirect('/posts/' . $params['post_id'] . '/edit');
	}

	/**
	 *  文章删除页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function delete(PostsModel $posts) {
		// 用户的权限认证
		$posts->delete();
		return redirect('/posts');
	}

	/**
	 * 文件上传
	 * @Author   sulingling
	 * @DateTime 2020-01-11
	 * @param    [param]
	 * @param    [param]
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function imageUpload(Request $request) {
		$path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
		return asset('/storage/' . $path);
	}
}
