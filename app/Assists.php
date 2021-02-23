<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assists extends Model {
	// 自定义主键
	protected $primaryKey = 'assist_id';

	// 开启白名单
	protected $fillable = ['user_id', 'post_id'];
}
