<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable {
	protected $table = 'users'; // 定义用户表表名
	protected $primaryKey = 'user_id'; // 定义用户表主键

	/**
	 * 用户注册
	 * @Author   sulingling
	 * @DateTime 2020-01-16
	 * @version  [version]
	 * @param    array      $params [前台提交过来的数据]
	 * @return   boolean            [true | false]
	 */
	public static function userSave($params = []) {
		if (empty($params)) {
			return false;
		}
		$model = new self();
		$model->name = $params['name'];
		$model->email = $params['email'];
		$model->password = bcrypt($params['password']);
		return $model->save();
	}
}
