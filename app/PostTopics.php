<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTopics extends Model {
	// 自定义主键
	protected $primaryKey = 'post_top_id';

	/**
	 * 专题文章添加
	 * @Author   sulingling
	 * @DateTime 2020-01-28
	 * @version  [version]
	 * @param    array      $params [前台提交的数据]
	 * @return   boolean            [true | false]
	 */
	public static function postSave($params = []) {
		if (empty($params)) {
			return false;
		}
		if (self::isOnly($params)) {
			return false;
		}
		$model = new self();
		$model->post_id = $params['post_id'];
		$model->top_id = $params['top_id'];
		return $model->save();
	}

	/**
	 * 查看数据库里面是否有该数据
	 * @Author   sulingling
	 * @DateTime 2020-01-28
	 * @version  [version]
	 * @param    array      $params [前台提交的数据]
	 * @return   object             [对象]
	 */
	private static function isOnly($params = []) {
		if (empty($params)) {
			return false;
		}
		return self::where([
			'post_id' => $params['post_id'],
			'top_id' => $params['top_id'],
		])
			->first();
	}
}
