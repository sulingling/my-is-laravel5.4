<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model {
	/// 自定义主键
	protected $primaryKey = 'top_id';

	/**
	 * 属于这个专题下的所有文章表
	 * @Author   sulingling
	 * @DateTime 2020-01-28
	 * @version  [version]
	 * @return   object     [对象]
	 */
	public function posts() {
		return $this->belongsToMany('App\Posts', 'post_topics', 'top_id', 'post_id');
	}

	/**
	 * 专题的文章数，用于withCount
	 * @Author   sulingling
	 * @DateTime 2020-01-28
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function postTopics() {
		return $this->hasMany('App\PostTopics', 'top_id', 'top_id');
	}

	/**
	 * 添加专题
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @version  [version]
	 * @param    array      [前台提交过来的数据]
	 * @return   boolean.   [true | false]
	 */
	public static function TopicsSave($params = []) {
		if (empty($params)) {
			return false;
		}
		$model = new self();
		$model->name = $params['name'];
		return $model->save();

	}
}
