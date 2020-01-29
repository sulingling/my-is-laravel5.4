<?php
namespace App\admin\Controllers;

class LoginController extends Controller {

	/**
	 * 登陆页面
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index() {
		return view('admin.login.index');
	}

	/**
	 * 登陆行为
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function login() {
		return '登出行为';
	}

	/**
	 * 登出行为
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function logout() {
		return '登出行为';
	}
}