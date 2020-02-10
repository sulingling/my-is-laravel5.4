<?php
namespace App\Http\Controllers;

use App\Users as UsersModel;

class UserController extends Controller {

	/**
	 * 个人设置页面
	 * @Author   sulingling
	 * @DateTime 2020-01-14
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function setting() {
		return view('user.setting');
	}

	/**
	 * 个人设置行为
	 * @Author   sulingling
	 * @DateTime 2020-01-14
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function settingStore() {
		return '个人设置行为';
	}

	/**
	 * 个人中心页面
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function show(UsersModel $user) {
		// 这个人的信息，包含关注/粉丝/文章数
		$userInfo = UsersModel::withCount(['fanPosts', 'starPosts', 'userPosts'])
			->find($user->user_id);
		// 这个人的文章列表，去创建时间最新的前10条
		$postInfo = $userInfo->userPosts()
			->orderBy('created_at', 'desc')
			->take(10)
			->get();
		// 这个人关注的用户，包含关注用户的 关注/粉丝/文章数
		$stars = $user->starPosts;
		$starsInfo = UsersModel::whereIn('user_id', $stars->pluck('star_id'))
			->withCount(['fanPosts', 'starPosts', 'userPosts'])
			->get();
		// 这个人粉丝的用户，包含粉丝用户的 关注/粉丝/文章数
		$fans = $user->fanPosts;
		$fansInfo = UsersModel::whereIn('user_id', $fans->pluck('fan_id'))
			->withCount(['fanPosts', 'starPosts', 'userPosts'])
			->get();
		return view('user.show', compact('userInfo', 'postInfo', 'starsInfo', 'fansInfo'));
	}

	/**
	 * 关注用户
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function fan(UsersModel $user) {
		$authUser = \Auth::user();
		$authUser->doFan($user->user_id);
		return [
			'error' => 0,
			'msg' => '',
		];

	}

	/**
	 * 取消关注
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function unFan(UsersModel $user) {
		$authUser = \Auth::user();
		$authUser->doUnFan($user->user_id);
		return [
			'error' => 0,
			'msg' => '',
		];
	}
}
