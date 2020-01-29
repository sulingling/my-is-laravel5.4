<?php
// 管理后台
Route::group(['prefix' => 'admin'], function () {
	// 登陆页面
	Route::get('/login', '\App\admin\Controllers\LoginController@index');
	// 登陆行为
	Route::post('/login', '\App\admin\Controllers\LoginController@login');
	// 登出行为
	Route::get('/logout', '\App\admin\Controllers\LoginController@logout');

	// 首页
	Route::get('/home', '\App\admin\Controllers\HomeController@index');
});