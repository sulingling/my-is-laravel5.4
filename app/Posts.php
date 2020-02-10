<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model {
	// 自定义主键
	protected $primaryKey = 'post_id';

	/**
	 * 定义全局的scope
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	protected static function boot() {
		parent::boot();
		static::addGlobalScope('avaiable', function (Builder $builder) {
			$builder->whereIn('status', [0, 1]);
		});
	}

	/**
	 * 评论模型
	 * @Author   sulingling
	 * @DateTime 2020-01-18
	 * @param    [param]
	 * @version  [version]
	 * @return   object     [对象]
	 */
	public function comments() {
		return $this->hasMany('App\Comments', 'post_id', 'post_id')->orderBy('created_at', 'desc');
	}

	/**
	 * 关联用户
	 * @Author   sulingling
	 * @DateTime 2020-01-18
	 * @param    [param]
	 * @version  [version]
	 * @return   object     [对象]
	 */
	public function user() {
		return $this->belongsTo('App\Users', 'user_id', 'user_id');
	}

	/**
	 * 和用户进行关联
	 * @Author   sulingling
	 * @DateTime 2020-01-19
	 * @version  [version]
	 * @param    integer    $userId [用户ID]
	 * @return   object             [对象]
	 */
	public function userAssists($userId = 0) {
		return $this->hasOne('App\Assists', 'post_id', 'post_id')->where('user_id', $userId);
	}

	/**
	 * 获取文章所有的赞
	 * @Author   sulingling
	 * @DateTime 2020-01-19
	 * @param    [param]
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function assists() {
		return $this->hasMany('App\Assists', 'post_id', 'post_id');
	}

	/**
	 * 属于某个作者的文章
	 * @Author   sulingling
	 * @DateTime 2020-01-28
	 * @version  [version]
	 * @param    Builder    $query  [description]
	 * @param    integer    $userId [用户ID]
	 * @return   object             [对象]
	 */
	public function scopeAuthorBy(Builder $query, $userId = 0) {
		return $query->where('user_id', $userId);
	}

	public function postTopics() {
		return $this->hasMany('App\PostTopics', 'post_id', 'post_id');
	}

	/**
	 * 不属于某个专题的文章
	 * @Author   sulingling
	 * @DateTime 2020-01-28
	 * @version  [version]
	 * @param    Builder    $query [description]
	 * @param    integer    $topId [description]
	 * @return   [type]            [description]
	 */
	public function scopeTopicNotBy(Builder $query, $topId = 0) {
		$query->doesntHave('postTopics', 'and', function ($q) use ($topId) {
			$q->where('top_id', $topId);
		});
	}

	/**
	 * 文章添加页面
	 * @Author   sulingling
	 * @DateTime 2020-01-11
	 * @param    array      $params [前台提交过来的数据]
	 * @return   boolean     对象    [true | false]
	 */
	public static function postsSave($params = []) {
		if (empty($params)) {
			return false;
		}
		$model = new self();
		$model->title = $params['title'];
		$model->content = $params['content'];
		$model->user_id = \Auth::id();
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
		$model->user_id = \Auth::id();
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
