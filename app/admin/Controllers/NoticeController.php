<?php
namespace App\admin\Controllers;

use App\Notices as NoticesModel;

class NoticeController extends Controller {

	/**
	 * 通知列表
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @param    [param]
	 * @version  [version]
	 * @return   [type]
	 */
	public function index(){
		$notices = NoticesModel::all();
		return view('/admin/notice/index', compact('notices'));
	}

	/**
	 * 通知表单
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @version  [version]
	 * @return   [type]
	 */
	public function create(){
		return view('/admin/notice/create');
	}

	/**
	 * 通知行为
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @version  [version]
	 * @return   [type]
	 */
	public function store(){
		// 验证
		$this->validate(request(), [
			'title' => 'required|string',
			'content' => 'required|string|max:1000'
		]);
		$params = request()->all();
		NoticesModel::noticeSave($params);
		return redirect('/admin/notices');
	}
}