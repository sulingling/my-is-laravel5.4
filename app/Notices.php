<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{
    // 自定义主键
    protected $primaryKey = 'not_id';

	/**
	 *  添加消息
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @version  [version]
	 * @return   [type]
	 */
    public static function noticeSave($params = []){
    	if (empty($params)) {
    		return false;
    	}
    	$model = new self();
    	$model->title = $params['title'];
    	$model->content = $params['content'];
    	return $model->save() ? $model : false;
    }
}
