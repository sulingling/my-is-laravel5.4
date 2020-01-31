<?php
namespace App\admin\Controllers;

use App\AdminRoles;
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

	/**
	 *  用户角色页面
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function role(AdminUsers $user) {
		$roles = AdminRoles::all();
		$myRole = $user->roles;
		return view('/admin/user/role', compact('roles', 'myRole', 'user'));
	}

	/**
	 *  储存用户角色
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function storeRole(AdminUsers $user) {
		$this->validate(request(), [
			'roles' => 'required|array',
		]);
		$roles = AdminRoles::findMany(request('roles'));
		$myRole = $user->roles;
		// 要增加的角色
		$addRoles = $roles->diff($myRole);
		foreach ($addRoles as $role) {
			$user->assignRole($role);
		}
		// 要删除的角色
		$deleteRoles = $myRole->diff($roles);
		foreach ($deleteRoles as $role) {
			$user->deleteRole($role);
		}
		return back();
	}
}