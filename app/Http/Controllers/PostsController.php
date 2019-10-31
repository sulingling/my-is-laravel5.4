<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class PostsController extends Controller{

	/**
	 *  文章列表页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function index(){
		return '文章列表页面';
	}

	/**
	 *  创建文章表单页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function create(){
		return '创建文章表单页面';
	}

	/**
	 *  创建文章表单提交页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function store(){
		return '创建文章表单提交页面';
	}

	/**
	 *  文章详情页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function show(){
		return '文章详情页面';
	}

	/**
	 *  变价文章表单页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function edit(){
		return '编辑文章表单页面';
	}

	/**
	 *  编辑文章提交表单页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function update(){
		return '编辑文章提交表单页面';
	}

	/**
	 *  文章删除页面
	 * @author sulingling
	 * @DateTime 2019-10-31
	 * @version  [version]
	 * @return   [type]     [description]
	 */
	public function delete(){
		return '文章删除页面';
	}
	
}