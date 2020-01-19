<?php
namespace App\Http\Controllers;

use App\Assists as AssistsModel;
use App\Comments as CommentsModel;
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
			->withCount(['comments', 'assists'])
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
		$posts->load('comments');
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
	public function update(PostsModel $posts) {
		// 用户权限认证
		$this->authorize('update', $posts);
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
		$this->authorize('delete', $posts);
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

	/**
	 * 文章提交评论
	 * @Author   sulingling
	 * @DateTime 2020-01-18
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function comment(PostsModel $post) {
		$this->validate(request(), [
			'content' => 'required|min:3',
		]);
		$params = request()->all();
		CommentsModel::comSave($post, $params);
		// 渲染
		return back();
	}

	/**
	 * 文章点赞
	 * @Author   sulingling
	 * @DateTime 2020-01-19
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function assist(PostsModel $post) {
		$params = [
			'user_id' => \Auth::id(),
			'post_id' => $post->post_id,
		];
		AssistsModel::firstOrCreate($params);
		return back();
	}

	/**
	 * 文章取消点赞
	 * @Author   sulingling
	 * @DateTime 2020-01-19
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function unAssist(PostsModel $post) {
		$post->userAssists(\Auth::id())->delete();
		return back();
	}
}
