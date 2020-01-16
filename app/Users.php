<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

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
