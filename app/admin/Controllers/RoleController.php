<?php
namespace App\admin\Controllers;

use App\AdminPermissions;
use App\AdminRoles;

class RoleController extends Controller {

	/**
	 *  角色列表
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index() {
		$roles = AdminRoles::paginate(10);
		return view('/admin/role/index', compact('roles'));
	}

	/**
	 * 创建角色
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function create() {
		return view('/admin/role/create');
	}

	/**
	 *  创建角色行为
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function store() {
		$this->validate(request(), [
			'name' => 'required|min:3',
			'desc' => 'required',
		]);
		$params = request()->all();
		AdminRoles::adminRoleSave($params);
		return redirect('admin/roles');
	}

	/**
	 *  角色权限关系页面【一个角色下面有所有的权限】
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function permission(AdminRoles $role) {
		// 获取所有权限
		$permissions = AdminPermissions::all();

		// 获取当前角色权限
		$myPermissions = $role->permissions;

		return view('/admin/role/permission', compact('permissions', 'myPermissions', 'role'));
	}

	/**
	 *  储存角色权限行为
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function storePermission(AdminRoles $role) {
		$this->validate(request(), [
			'permissions' => 'required|array',
		]);
		$permissions = AdminPermissions::findMany(request('permissions'));
		$myPermissions = $role->permissions;
		// 要增加的角色
		$addPermissions = $permissions->diff($myPermissions);
		foreach ($addPermissions as $permission) {
			$role->grantPermission($permission);
		}
		// 要删除的角色
		$deletePermissions = $myPermissions->diff($permissions);
		foreach ($deletePermissions as $permission) {
			$role->deletePermission($permissions);
		}
		return back();
	}
}