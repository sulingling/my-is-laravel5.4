<?php

namespace App\Policies;

use App\Posts;
use App\Users;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostsPolicy {
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * 修改权限
	 * @Author   sulingling
	 * @DateTime 2020-01-18
	 * @version  [version]
	 * @param    Users      $users [用户信息]
	 * @param    Posts      $posts [文章信息]
	 * @return   [boolean]         [true | false]
	 */
	public function update(Users $users, Posts $posts) {
		return $users->user_id == $posts->user_id;
	}

	/**
	 * 删除权限
	 * @Author   sulingling
	 * @DateTime 2020-01-18
	 * @version  [version]
	 * @param    Users      $users [用户信息]
	 * @param    Posts      $posts [文章信息]
	 * @return   [boolean]         [true | false]
	 */
	public function delete(Users $users, Posts $posts) {
		return $users->user_id == $posts->user_id;
	}
}
