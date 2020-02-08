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
		// 验证
		$this->validate(request(), [
			'name' => 'required|min:2',
			'password' => 'required|min:5|max:10',
		]);
		// 逻辑
		$user = request(['name', 'password']);
		// 渲染
		if (\Auth::guard('admin')->attempt($user)) {
			return redirect('/admin/home');
		}
		return \Redirect::back()->withErrors('用户名密码不匹配');
	}

	/**
	 * 登出行为
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function logout() {
		\Auth::guard('admin')->logout();
		return redirect('/admin/login');
	}
}