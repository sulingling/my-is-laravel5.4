<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPermissions extends Model {
	// 自定义主键
	protected $primaryKey = 'per_id';
	/**
	 * 该权限属于哪个角色
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function roles() {
		return $this->belongsToMany('App\AdminRoles', 'admin_permission_role', 'per_id', 'role_id')
			->withPivot(['per_id', 'role_id']);
	}

	/**
	 * 添加权限
	 * @Author   sulingling
	 * @DateTime 2020-01-31
	 * @version  [version]
	 * @param    array      $params [前台提交的数据]
	 * @return   object             [true | false]
	 */
	public static function adminPerSave($params = []) {
		if (empty($params)) {
			return false;
		}
		$model = new self();
		$model->name = $params['name'];
		$model->desc = $params['desc'];
		return $model->save();
	}
}
