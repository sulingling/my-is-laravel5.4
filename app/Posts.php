<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {
	// 自定义主键
	protected $primaryKey = 'post_id';

	/**
	 * 文章添加页面
	 * @Author   sulingling
	 * @DateTime 2020-01-11
	 * @param    array      $params [description]
	 * @return   boolean     对象。  [true | false]
	 */
	public static function postsSave($params = []) {
		if (empty($params)) {
			return false;
		}
		$model = new self();
		$model->title = $params['title'];
		$model->content = $params['content'];
		return $model->save();
	}

	/**
	 *  文章编辑
	 * @Author   sulingling
	 * @DateTime 2020-01-12
	 * @param    array      $params [前台提交过来的数据]
	 * @return   [boolean]          [文章ID | false]
	 */
	public static function editPosts($params = []) {
		if (empty($params)) {
			return false;
		}
		$model = self::getPosts($params['post_id']);
		if (empty($model)) {
			return false;
		}
		$model->title = $params['title'];
		$model->content = $params['content'];
		return $model->save() ? $model->post_id : false;
	}

	/**
	 * 获取文章详情
	 * @Author   sulingling
	 * @DateTime 2020-01-12
	 * @param    integer    $postId [文章ID]
	 * @return   object             [文章对象]
	 */
	protected static function getPosts($postId = 0) {
		return self::find($postId);
	}
}
