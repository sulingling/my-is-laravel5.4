<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{

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
    	return $model->save();
    }
}
