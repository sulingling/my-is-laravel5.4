<?php

namespace App\Http\Controllers;

class LoginController extends Controller {

	/**
	 * 登陆页面
	 * @Author   sulingling
	 * @DateTime 2020-01-14
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index() {
		return view('login.index');
	}

	/**
	 *  登陆行为
	 * @Author   sulingling
	 * @DateTime 2020-01-14
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function login() {
		// 验证
		$this->validate(request(), [
			'email' => 'required|email',
			'password' => 'required|min:5|max:10',
			'is_remember' => 'integer',
		]);
		// 逻辑
		$user = request(['email', 'password']);
		$isRemember = request('is_remember');
		// 渲染
		if (\Auth::attempt($user, $isRemember)) {
			return redirect('/posts');
		}
		return \Redirect::back()->withErrors('邮箱密码不匹配');
	}

	/**
	 * 登出行为
	 * @Author   sulingling
	 * @DateTime 2020-01-14
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function logout() {
		\Auth::logout();
		return redirect('/login');
	}
}
