<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable {
	protected $table = 'users'; // 定义用户表表名
	protected $primaryKey = 'user_id'; // 定义用户表主键

	/**
	 * 用户的文章列表
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @param    [param]
	 * @version  [version]
	 * @return   object     [对象]
	 */
	public function userPosts() {
		return $this->hasMany('App\Posts', 'user_id', 'user_id');
	}

	/**
	 * 关注我的fan模型[粉丝]
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   object     [对象]
	 */
	public function fanPosts() {
		return $this->hasMany('App\Fans', 'star_id', 'user_id');
	}

	/**
	 * 我关注fan模型[明星]
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   object     [对象]
	 */
	public function starPosts() {
		return $this->hasMany('App\Fans', 'fan_id', 'user_id');
	}

	/**
	 * 关注某人
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @param    integer    $userId [用户ID]
	 * @return   boolean            [true | false]
	 */
	public function doFan($userId = 0) {
		if (empty($userId)) {
			return false;
		}
		$fanModel = new Fans();
		$fanModel->star_id = $userId;
		return $this->starPosts()->save($fanModel);
	}

	/**
	 * 取消关注
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @param    integer    $userId [用户ID]
	 * @return   boolean            [true | false]
	 */
	public function doUnFan($userId = 0) {
		if (empty($userId)) {
			return false;
		}
		$fanModel = new Fans();
		$fanModel->star_id = $userId;
		return $this->starPosts()->delete($fanModel);
	}

	/**
	 * 当前用户是否有粉丝
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   number    [数量]
	 */
	public function hasFan($userId = 0) {
		return $this->fanPosts()->where('fan_id', $userId)->count();
	}

	/**
	 * 当前用户是否关注了明星
	 * @Author   sulingling
	 * @DateTime 2020-01-20
	 * @version  [version]
	 * @return   number    [数量]
	 */
	public function hasStar($userId = 0) {
		return $this->starPosts()->where('star_id', $userId)->count();
	}

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
