<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUsers extends Authenticatable {
	protected $rememberTokenName = '';
	protected $primaryKey = 'admin_user_id'; // 定义用户表主键

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
