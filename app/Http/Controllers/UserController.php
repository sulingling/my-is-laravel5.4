<?php

namespace App\Http\Controllers;

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
	public function show() {
		return view('user.show');
	}

	/**
	 * 个人中心关注
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function fan() {

	}

	/**
	 * 个人中心取消关注
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function unFan() {

	}
}
