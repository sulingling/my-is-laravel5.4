<?php
namespace App\Http\Controllers;

class NoticeController extends Controller {
	/**
	 * 通知消息
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @version  [version]
	 * @return   [type]
	 */
	public function index(){
		// 获取当前用户
		$user = \Auth::user();
		$notices = $user->notices;
		return view('notice.index', compact('notices'));
	}
}