<?php
namespace App\admin\Controllers;

use App\Topics as TopicsModel;

class TopicController extends Controller {

	/**
	 * 专题列表
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @param    [param]
	 * @version  [version]
	 * @return   [type]
	 */
	public function index(){
		$topics = TopicsModel::all();
		return view('/admin/topic/index', compact('topics'));
	}

	/**
	 * 专题表单
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @version  [version]
	 * @return   [type]
	 */
	public function create(){
		return view('/admin/topic/create');
	}

	/**
	 * 专题行为
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @version  [version]
	 * @return   [type]
	 */
	public function store(){
		// 验证
		$this->validate(request(), [
			'name' => 'required|string',
		]);
		$params = request()->all();
		TopicsModel::TopicsSave($params);
		return redirect('/admin/topics');
	}

	/**
	 * 删除专题
	 * @Author   sulingling
	 * @DateTime 2020-02-09
	 * @version  [version]
	 * @return   [type]
	 */
	public function delete(TopicsModel $topic){
		$topic->delete();
		return redirect('/admin/topics');
	}
}