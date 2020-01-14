<?php

namespace App\Http\Controllers;

class RegisterController extends Controller {
	/**
	 *  注册页面
	 * @Author   sulingling
	 * @DateTime 2020-01-14
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index() {
		return view('register.index');
	}

	/**
	 * 注册行为
	 * @Author   sulingling
	 * @DateTime 2020-01-14
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function register() {
		return '注册行为';
	}
}
