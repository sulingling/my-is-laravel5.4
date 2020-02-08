<?php
namespace App\admin\Controllers;

class HomeController extends Controller {

	/**
	 * 首页
	 * @Author   sulingling
	 * @DateTime 2020-01-29
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index() {
		return view('admin.home.index');
	}
}