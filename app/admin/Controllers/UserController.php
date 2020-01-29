<?php
namespace App\admin\Controllers;

use App\AdminUsers;

class UserController extends Controller {

	/**
	 * 管理人员列表页面
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index() {
		$userInfo = AdminUsers::paginate(6);
		return view('/admin/user/index', compact('userInfo'));
	}

	/**
	 * 管理人员表单页面
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function create() {
		return view('/admin/user/create');
	}

	/**
	 * 管理人员添加页面
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function store() {
		// 验证逻辑
		$this->validate(request(), [
			'name' => 'required|min:3|unique:admin_users,name',
			'password' => 'required',
		]);
		$params = request()->all();
		AdminUsers::adminUserSave($params);
		return redirect('/admin/user');
	}
}