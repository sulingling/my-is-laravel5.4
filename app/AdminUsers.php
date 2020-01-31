<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUsers extends Authenticatable {
	protected $rememberTokenName = '';
	protected $primaryKey = 'admin_user_id'; // 定义用户表主键

	/**
	 *  用户有哪些角色
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function roles() {
		return $this->belongsToMany('\App\AdminRoles', 'admin_role_user', 'user_id', 'role_id')
			->withPivot(['user_id', 'role_id']);
	}

	/**
	 * 判断是否有某些角色，某个角色
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @param    object     $roles [对象]
	 * @return   boolean           [description]
	 */
	public function isInRoles($role) {
		return !!$role->intersect($this->roles)->count();
	}

	/**
	 * 给用户分配某些角色
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @param    [type]     $role [description]
	 * @return   [type]           [description]
	 */
	public function assignRole($role) {
		return $this->roles()->save($role);
	}

	/**
	 * 取消用户分配的角色
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @param    [type]     $role [description]
	 * @return   [type]           [description]
	 */
	public function deleteRole($role) {
		return $this->roles()->detach($role);
	}

	/**
	 * 该用户是否有该权限
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @param    [type]     $permission [description]
	 * @return   [type]                 [description]
	 */
	public function haPermission($permission) {
		return $this->isInRoles($permission->roles);
	}

	/**
	 * 用户注册
	 * @Author   sulingling
	 * @DateTime 2020-01-16
	 * @version  [version]
	 * @param    array      $params [前台提交过来的数据]
	 * @return   boolean            [true | false]
	 */
	public static function adminUserSave($params = []) {
		if (empty($params)) {
			return false;
		}
		$model = new self();
		$model->name = $params['name'];
		$model->password = bcrypt($params['password']);
		return $model->save();
	}
}
