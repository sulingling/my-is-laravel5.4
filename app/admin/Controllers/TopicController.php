<?php
namespace App\admin\Controllers;

class TopicController extends Controller {
	public function index(){
		return view('/admin/topic/index');
	}
	public function create(){
		return view('/admin/topic/create');
	}
	public function store(){
		return view('/admin/topic/index');
	}
	public function desc(){
		return view('/admin/topic/desc');
	}
}