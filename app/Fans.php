<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fans extends Model {
	// 自定义主键
	protected $primaryKey = 'fans_id';

	/**
	 * 粉丝用户
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function fanUser() {
		return $this->hasOne('App\Users', 'user_id', 'fan_id');
	}

	/**
	 * 被关注用户
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function starUser()}{
		return $this->hasOne('App\Users', 'user_id', 'star_id');	
	}
}
