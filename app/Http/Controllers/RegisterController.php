<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Http\Request;

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
	public function register(Request $request) {
		// 验证
		$this->validate($request, [
			'name' => 'required|min:3|max:100|unique:users,name', //非空|字符串|最大长度|最小长度
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:5|max:10|confirmed',
		]);
		// 逻辑
		$params = request()->all();
		Users::userSave($params);
		return redirect('/login');
	}
}
