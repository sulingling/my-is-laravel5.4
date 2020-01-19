<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

	/**
	 * 评论所属文章
	 * @Author   sulingling
	 * @DateTime 2020-01-18
	 * @version  [version]
	 * @return   object     [对象]
	 */
	public function post() {
		return $this->belongsTo('App\Posts', 'post_id', 'post_id');
	}

	/**
	 *  评论所属用户
	 * @Author   sulingling
	 * @DateTime 2020-01-18
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function user() {
		return $this->belongsTo('App\Users', 'user_id', 'user_id');
	}

	/**
	 * 添加评论
	 * @Author   sulingling
	 * @DateTime 2020-01-18
	 * @version  [version]
	 * @param    object()     $post   [文章对象]
	 * @param    array        $params [传递过来的数据]
	 * @return   boolean              [true | false]
	 */
	public static function comSave($post, $params = []) {
		if (empty($params)) {
			return false;
		}
		$model = new self();
		$model->content = $params['content'];
		$model->user_id = \Auth::id();
		return $post->comments()->save($model);
	}
}
