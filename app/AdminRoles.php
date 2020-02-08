<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRoles extends Model {
	// 自定义主键
	protected $primaryKey = 'role_id';

	/**
	 * 当前角色的所有权限
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function permissions() {
		return $this->belongsToMany('App\AdminPermissions', 'admin_permission_role', 'role_id', 'per_id')
			->withPivot(['role_id', 'per_id']);
	}

	/**
	 * 给角色赋予权限
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function grantPermission($permission) {
		return $this->permissions()->save($permission);
	}

	/**
	 *  取消角色赋予的权限
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @param    [type]     $permission [description]
	 * @return   [type]                 [description]
	 */
	public function deletePermission($permission) {
		return $this->permissions()->detach($permission);
	}

	/**
	 *  判断角色是否有权限
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @param    [type]     $permission [description]
	 * @return   boolean                [description]
	 */
	public function hasPermission($permission) {
		return $this->permissions()->contains($permission);
	}

	/**
	 * 添加角色
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @param    array      $params [description]
	 * @return   [type]             [description]
	 */
	public static function adminRoleSave($params = []) {
		if (empty($params)) {
			return false;
		}
		$model = new self();
		$model->name = $params['name'];
		$model->desc = $params['desc'];
		return $model->save();
	}
}
