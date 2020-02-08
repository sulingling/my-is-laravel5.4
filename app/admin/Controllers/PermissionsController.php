<?php
namespace App\admin\Controllers;

use App\AdminPermissions;

class PermissionsController extends Controller {

	/**
	 *  权限列表页面
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index() {
		$permissions = AdminPermissions::paginate(10);
		return view('/admin/permission/index', compact('permissions'));
	}

	/**
	 *  创建权限页面
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function create() {
		return view('/admin/permission/create');
	}

	/**
	 * 创建权限行为
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
		AdminPermissions::adminPerSave($params);
		return redirect('admin/permissions');
	}
}